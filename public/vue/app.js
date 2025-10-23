// Bheem Academy Vue App
const { createApp, ref, onMounted, computed } = Vue;

// Router simulation (simple hash-based routing)
const useRouter = () => {
    const currentRoute = ref(window.location.hash.slice(1) || '/courses');
    const params = ref({});
    
    const navigate = (path) => {
        window.location.hash = path;
        currentRoute.value = path;
        parseRoute();
    };
    
    const parseRoute = () => {
        const hash = window.location.hash.slice(1);
        const [path, query] = hash.split('?');
        currentRoute.value = path || '/courses';
        
        // Parse query params
        params.value = {};
        if (query) {
            query.split('&').forEach(param => {
                const [key, value] = param.split('=');
                params.value[key] = decodeURIComponent(value);
            });
        }
    };
    
    window.addEventListener('hashchange', parseRoute);
    parseRoute();
    
    return {
        currentRoute,
        params,
        navigate
    };
};

// API helper
const api = {
    async get(endpoint) {
        const response = await fetch(`/api/${endpoint}`);
        if (!response.ok) {
            throw new Error(`API error: ${response.statusText}`);
        }
        return await response.json();
    }
};

// Main App Component
const App = {
    setup() {
        const { currentRoute, params, navigate } = useRouter();
        
        return {
            currentRoute,
            params,
            navigate
        };
    },
    template: `
        <div id="app">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <h1 @click="navigate('/courses')" style="cursor: pointer;">
                            🎓 Bheem Academy
                        </h1>
                    </div>
                    <div class="navbar-menu">
                        <a @click="navigate('/courses')" :class="{ active: currentRoute === '/courses' }">
                            Courses
                        </a>
                        <a href="/login.php?user=student">Login</a>
                    </div>
                </div>
            </nav>
            
            <main class="main-content">
                <component :is="currentRoute === '/courses' ? 'CourseList' : 'CourseDetail'" 
                           :params="params" 
                           @navigate="navigate" />
            </main>
            
            <footer class="footer">
                <div class="container">
                    <p>&copy; 2025 Bheem Academy. All rights reserved.</p>
                </div>
            </footer>
        </div>
    `
};

// Course List Component
const CourseList = {
    setup(props, { emit }) {
        const courses = ref([]);
        const loading = ref(true);
        const error = ref(null);
        
        const loadCourses = async () => {
            try {
                loading.value = true;
                const data = await api.get('courses.php');
                courses.value = data.courses;
            } catch (e) {
                error.value = e.message;
            } finally {
                loading.value = false;
            }
        };
        
        onMounted(loadCourses);
        
        const viewCourse = (courseId) => {
            emit('navigate', `<br>/course?id=${courseId}`);
        };
        
        return {
            courses,
            loading,
            error,
            viewCourse
        };
    },
    template: `
        <div class="container">
            <h2 class="page-title">Available Courses</h2>
            
            <div v-if="loading" class="loading">
                <div class="spinner"></div>
                <p>Loading courses...</p>
            </div>
            
            <div v-else-if="error" class="error">
                <p>{{ error }}</p>
            </div>
            
            <div v-else class="courses-grid">
                <div v-for="course in courses" :key="course.id" class="course-card" @click="viewCourse(course.id)">
                    <div class="course-header">
                        <h3>{{ course.fullname }}</h3>
                    </div>
                    <div class="course-body">
                        <p class="course-shortname">{{ course.shortname }}</p>
                        <p class="course-summary">{{ course.summary }}</p>
                    </div>
                    <div class="course-footer">
                        <button class="btn btn-primary">View Course →</button>
                    </div>
                </div>
            </div>
        </div>
    `
};

// Course Detail Component
const CourseDetail = {
    props: ['params'],
    setup(props) {
        const course = ref(null);
        const sections = ref([]);
        const loading = ref(true);
        const error = ref(null);
        
        const loadCourse = async () => {
            try {
                loading.value = true;
                const courseId = props.params.id;
                const data = await api.get(`course-detail.php?id=${courseId}`);
                course.value = data.course;
                sections.value = data.sections;
            } catch (e) {
                error.value = e.message;
            } finally {
                loading.value = false;
            }
        };
        
        onMounted(loadCourse);
        
        return {
            course,
            sections,
            loading,
            error
        };
    },
    template: `
        <div class="container">
            <div v-if="loading" class="loading">
                <div class="spinner"></div>
                <p>Loading course...</p>
            </div>
            
            <div v-else-if="error" class="error">
                <p>{{ error }}</p>
            </div>
            
            <div v-else-if="course" class="course-detail">
                <div class="course-hero">
                    <h1>{{ course.fullname }}</h1>
                    <p class="course-shortname">{{ course.shortname }}</p>
                    <p class="course-description">{{ course.summary }}</p>
                </div>
                
                <div class="course-content">
                    <h2>Course Content</h2>
                    
                    <div v-if="sections.length === 0" class="no-sections">
                        <p>No sections available yet. Check back soon!</p>
                    </div>
                    
                    <div v-else class="sections-list">
                        <div v-for="section in sections" :key="section.id" class="section-card">
                            <h3>{{ section.name || 'Section ' + section.section }}</h3>
                            <div v-if="section.summary" class="section-summary" v-html="section.summary"></div>
                            
                            <div v-if="section.modules && section.modules.length > 0" class="modules-list">
                                <div v-for="module in section.modules" :key="module.id" class="module-item">
                                    <span class="module-icon">📄</span>
                                    <span class="module-name">{{ module.name }}</span>
                                    <span v-if="module.completed" class="module-status completed">✓</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `
};

// Register components and create app
const app = createApp(App);
app.component('CourseList', CourseList);
app.component('CourseDetail', CourseDetail);
app.mount('#app');
