from fastapi import APIRouter, Depends
from fastapi.responses import HTMLResponse
from sqlalchemy.orm import Session
from sqlalchemy import and_

from core.database import get_moodle_db
from models.moodle_models import Course, CourseCategory as MoodleCourseCategory

router = APIRouter()

@router.get("/index-page", response_class=HTMLResponse)
async def course_index_page(moodle_db: Session = Depends(get_moodle_db)):
    """Course index page with dev design"""
    
    # Fetch categories
    categories = moodle_db.query(MoodleCourseCategory).filter(
        MoodleCourseCategory.visible == 1
    ).order_by(MoodleCourseCategory.sortorder, MoodleCourseCategory.name).all()

    # Build HTML
    categories_sections = []
    
    for category in categories:
        # Fetch courses for this category
        courses = moodle_db.query(Course).filter(
            and_(
                Course.category == category.id,
                Course.visible == 1
            )
        ).order_by(Course.sortorder, Course.fullname).all()

        if not courses:
            continue

        # Build course cards
        course_cards = []
        for course in courses:
            shortname = course.shortname or ''
            course_card = f'''
            <div class="course-card">
                <div class="course-card-inner">
                    <div class="course-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="course-info">
                        <h4>{course.fullname}</h4>
                        <p class="course-shortname">{shortname}</p>
                    </div>
                    <a href="https://newdesign.bheem.cloud/course/view.php?id={course.id}" class="course-link">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            '''
            course_cards.append(course_card)

        courses_html = '\n'.join(course_cards)
        
        category_section = f'''
        <div class="category-section">
            <div class="category-header">
                <h2 class="category-title">
                    <i class="fas fa-folder-open"></i>
                    {category.name}
                </h2>
                <span class="course-count">{len(courses)} courses</span>
            </div>
            <div class="courses-grid">
                {courses_html}
            </div>
        </div>
        '''
        categories_sections.append(category_section)

    all_categories_html = '\n'.join(categories_sections)

    html_content = f'''<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Categories - Bheem Academy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }}

        body {{
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
        }}

        .container {{
            max-width: 1400px;
            margin: 0 auto;
        }}

        .page-header {{
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }}

        .page-header h1 {{
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.2);
        }}

        .page-header p {{
            font-size: 1.2rem;
            opacity: 0.9;
        }}

        .category-section {{
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }}

        .category-header {{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid #667eea;
        }}

        .category-title {{
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 1rem;
        }}

        .category-title i {{
            color: #667eea;
            font-size: 1.8rem;
        }}

        .course-count {{
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
        }}

        .courses-grid {{
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }}

        .course-card {{
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }}

        .course-card:hover {{
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            border-color: #667eea;
        }}

        .course-card-inner {{
            display: flex;
            align-items: center;
            gap: 1rem;
        }}

        .course-icon {{
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }}

        .course-info {{
            flex: 1;
        }}

        .course-info h4 {{
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }}

        .course-shortname {{
            font-size: 0.85rem;
            color: #718096;
            line-height: 1.5;
        }}

        .course-link {{
            background: #667eea;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }}

        .course-link:hover {{
            background: #764ba2;
            transform: scale(1.1);
        }}

        .back-button {{
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }}

        .back-button:hover {{
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(-5px);
        }}

        @media (max-width: 768px) {{
            .courses-grid {{
                grid-template-columns: 1fr;
            }}

            .page-header h1 {{
                font-size: 2rem;
            }}

            .category-title {{
                font-size: 1.5rem;
            }}

            .category-header {{
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }}
        }}
    </style>
</head>
<body>
    <div class="container">
        <a href="https://newdesign.bheem.cloud/" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>

        <div class="page-header">
            <h1>Course Categories</h1>
            <p>Explore our comprehensive range of courses across different categories</p>
        </div>

        {all_categories_html}
    </div>
</body>
</html>
'''

    return HTMLResponse(content=html_content)
