<?php
/*
* COURSE HANDLER
*/

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot. '/course/renderer.php');
include_once($CFG->dirroot . '/course/lib.php');

class edooCourseHandler {
    public function edooGetCourseDetails($courseId) {
        global $CFG, $COURSE, $USER, $DB, $SESSION, $SITE, $PAGE, $OUTPUT;


        $courseId = (int)$courseId;
        if ($DB->record_exists('course', array('id' => $courseId))) {
        // @edooComm: Initiate
        $edooCourse = new \stdClass();
        $chelper = new coursecat_helper();
        $courseContext = context_course::instance($courseId);

        $courseRecord = $DB->get_record('course', array('id' => $courseId));
        $courseElement = new core_course_list_element($courseRecord);

        /* @edooBreak */
        $courseId = $courseRecord->id;
        $courseShortName = $courseRecord->shortname;
        $courseFullName = $courseRecord->fullname;
        $courseSummary = $chelper->get_course_formatted_summary($courseElement, array('noclean' => true, 'para' => false));
        $courseFormat = $courseRecord->format;
        $courseAnnouncements = $courseRecord->newsitems;
        $courseStartDate = $courseRecord->startdate;
        $courseEndDate = $courseRecord->enddate;
        $courseVisible = $courseRecord->visible;
        $courseCreated = $courseRecord->timecreated;
        $courseUpdated = $courseRecord->timemodified;
        $courseRequested = $courseRecord->requested;
        $courseEnrolmentCount = count_enrolled_users($courseContext);
        $course_is_enrolled = is_enrolled($courseContext, $USER->id, '', true);

        /* @edooBreak */
        $categoryId = $courseRecord->category;

        try {
            $courseCategory = core_course_category::get($categoryId);
            $categoryName = $courseCategory->get_formatted_name();
            $categoryUrl = $CFG->wwwroot . '/course/index.php?categoryid='.$categoryId;
        } catch (Exception $e) {
            $courseCategory = "";
            $categoryName = "";
            $categoryUrl = "";
        }

        /* @edooBreak */
        $enrolmentLink = $CFG->wwwroot . '/enrol/index.php?id=' . $courseId;
        $courseUrl = new moodle_url('/course/view.php', array('id' => $courseId));
        // @edooComm: Start Payment
        $enrolInstances = enrol_get_instances($courseId, true);

        $course_price = '';
        $course_currency = '';
        foreach($enrolInstances as $singleenrolInstances){
            if($singleenrolInstances->enrol == 'paypal'){
                $course_price = $singleenrolInstances->cost;
                $course_currency = $singleenrolInstances->currency;
            }elseif($singleenrolInstances->enrol == 'stripe'){
                $course_price = $singleenrolInstances->cost;
                $course_currency = $singleenrolInstances->currency;
            }elseif($singleenrolInstances->enrol == 'payfast'){
                $course_price = $singleenrolInstances->cost;
                $course_currency = $singleenrolInstances->currency;
            }else{
                $course_price = $singleenrolInstances->cost;
                $course_currency = $singleenrolInstances->currency;
            }
        }
        

        $edooArrayOfCosts = array();
            $edooCourseContacts = array();
            if ($courseElement->has_course_contacts()) {
                foreach ($courseElement->get_course_contacts() as $key => $courseContact) {
                $edooCourseContacts[$key] = new \stdClass();
                $edooCourseContacts[$key]->userId = $courseContact['user']->id;
                $edooCourseContacts[$key]->username = $courseContact['user']->username;
                $edooCourseContacts[$key]->name = $courseContact['user']->firstname . ' ' . $courseContact['user']->lastname;
                $edooCourseContacts[$key]->role = $courseContact['role']->displayname;
                $edooCourseContacts[$key]->profileUrl = new moodle_url('/user/view.php', array('id' => $courseContact['user']->id, 'course' => SITEID));
                }
            }


        // @edooComm: Process first image
        $contentimages = $contentfiles = $CFG->wwwroot . '/theme/bheem/pix/category.jpg';
        foreach ($courseElement->get_course_overviewfiles() as $file) {
            $isimage = $file->is_valid_image();
            $url = file_encode_url("{$CFG->wwwroot}/pluginfile.php",
                    '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                    $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
            if ($isimage) {
                $contentimages = $url;
            } else {
                $contentfiles = $CFG->wwwroot . '/theme/bheem/pix/category.jpg';
            }
        }

        /* Map data */
        $edooCourse->courseId = $courseId;
        $edooCourse->enrolments = $courseEnrolmentCount;
        $edooCourse->categoryId = $categoryId;
        $edooCourse->categoryName = $categoryName;
        $edooCourse->categoryUrl = $categoryUrl;
        $edooCourse->shortName = $courseShortName;
        $edooCourse->fullName = format_text($courseFullName, FORMAT_HTML, array('filter' => true));
        $edooCourse->summary = $courseSummary;
        $edooCourse->imageUrl = $contentimages;
        $edooCourse->format = $courseFormat;
        $edooCourse->announcements = $courseAnnouncements;
        $edooCourse->startDate = userdate($courseStartDate, get_string('strftimedatefullshort', 'langconfig'));
        $edooCourse->endDate = userdate($courseEndDate, get_string('strftimedatefullshort', 'langconfig'));
        $edooCourse->visible = $courseVisible;
        $edooCourse->created = userdate($courseCreated, get_string('strftimedatefullshort', 'langconfig'));
        $edooCourse->updated = userdate($courseUpdated, get_string('strftimedatefullshort', 'langconfig'));
        $edooCourse->requested = $courseRequested;
        $edooCourse->enrolmentLink = $enrolmentLink;
        $edooCourse->url = $courseUrl;
        $edooCourse->teachers = $edooCourseContacts;
        $edooCourse->course_price = $course_price;
        $edooCourse->course_currency = $course_currency;
        $edooCourse->course_is_enrolled = $course_is_enrolled;

        /* Render object */
        $edooRender = new \stdClass();
        $edooRender->enrolmentIcon = '';
        $edooRender->enrolmentIcon1 = '';
        $edooRender->announcementsIcon     =     '';
        $edooRender->announcementsIcon1     =     '';
        $edooRender->updatedDate           =     '';
        $edooRender->updatedDate         =     userdate($courseUpdated, get_string('strftimedatefullshort', 'langconfig'));
        $edooRender->title             =     '<h3><a href="'. $edooCourse->url .'">'. $edooCourse->fullName .'</a></h3>';
        $edooRender->coverImage        =     '<img class="img-whp" src="'. $contentimages .'" alt="'.$edooCourse->fullName.'">';
        $edooRender->ImageUrl = $contentimages;
        /* @edooBreak */
        $edooCourse->edooRender = $edooRender;
        return $edooCourse;
        }
        return null;
    }

    public function edooGetCourseDescription($courseId, $maxLength){
        global $CFG, $COURSE, $USER, $DB, $SESSION, $SITE, $PAGE, $OUTPUT;
    
        if ($DB->record_exists('course', array('id' => $courseId))) {
        $chelper = new coursecat_helper();
        $courseContext = context_course::instance($courseId);
    
        $courseRecord = $DB->get_record('course', array('id' => $courseId));
        $courseElement = new core_course_list_element($courseRecord);
    
        if ($courseElement->has_summary()) {
            $courseSummary = $chelper->get_course_formatted_summary($courseElement, array('noclean' => false, 'para' => false));
            if($maxLength != null) {
            if (strlen($courseSummary) > $maxLength) {
                $courseSummary = wordwrap($courseSummary, $maxLength);
                $courseSummary = substr($courseSummary, 0, strpos($courseSummary, "\n")) . '...';
            }
            }
            return $courseSummary;
        }
    
        }
        return null;
    }

    public function edooListCategories(){
        global $DB, $CFG;
        $topcategory = core_course_category::top();
        $topcategorykids = $topcategory->get_children();
        $areanames = array();
        foreach ($topcategorykids as $areaid => $topcategorykids) {
            $areanames[$areaid] = $topcategorykids->get_formatted_name();
            foreach($topcategorykids->get_children() as $k=>$child){
                $areanames[$k] = $child->get_formatted_name();
            }
        }
        return $areanames;
    }

    public function edooGetCategoryDetails($categoryId){
        global $CFG, $COURSE, $USER, $DB, $SESSION, $SITE, $PAGE, $OUTPUT;
    
        if ($DB->record_exists('course_categories', array('id' => $categoryId))) {
    
        $categoryRecord = $DB->get_record('course_categories', array('id' => $categoryId));
    
        $chelper = new coursecat_helper();
        $categoryObject = core_course_category::get($categoryId);
    
        $edooCategory = new \stdClass();
    
        $categoryId = $categoryRecord->id;
        $categoryName = format_text($categoryRecord->name, FORMAT_HTML, array('filter' => true));
        $categoryDescription = $chelper->get_category_formatted_description($categoryObject);
    
        $categorySummary = format_string($categoryRecord->description, $striplinks = true,$options = null);
        $isVisible = $categoryRecord->visible;
        $categoryUrl = $CFG->wwwroot . '/course/index.php?categoryid=' . $categoryId;
        $categoryCourses = $categoryObject->get_courses();
        $categoryCoursesCount = count($categoryCourses);
    
        $categoryGetSubcategories = [];
        $categorySubcategories = [];
        if (!$chelper->get_categories_display_option('nodisplay')) {
            $categoryGetSubcategories = $categoryObject->get_children($chelper->get_categories_display_options());
        }
        foreach($categoryGetSubcategories as $k=>$edooSubcategory) {
            $edooSubcat = new \stdClass();
            $edooSubcat->id = $edooSubcategory->id;
            $edooSubcat->name = $edooSubcategory->name;
            $edooSubcat->description = $edooSubcategory->description;
            $edooSubcat->depth = $edooSubcategory->depth;
            $edooSubcat->coursecount = $edooSubcategory->coursecount;
            $categorySubcategories[$edooSubcategory->id] = $edooSubcat;
        }
    
        $categorySubcategoriesCount = count($categorySubcategories);
    
        /* Do image */
        $outputimage = '';
        //edooComm: Fetching the image manually added to the coursecat description via the editor.
        $description = $chelper->get_category_formatted_description($categoryObject);
        $src = "";
        if ($description) {
            $dom = new DOMDocument();
            $dom->loadHTML($description);
            $xpath = new DOMXPath($dom);
            $src = $xpath->evaluate("string(//img/@src)");
        }
        if ($src && $description){
            $outputimage = $src;
        } else {
            foreach($categoryCourses as $child_course) {
            if ($child_course === reset($categoryCourses)) {
                foreach ($child_course->get_course_overviewfiles() as $file) {
                    if ($file->is_valid_image()) {
                        $imagepath = '/' . $file->get_contextid() . '/' . $file->get_component() . '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename();
                        $imageurl = file_encode_url($CFG->wwwroot . '/pluginfile.php', $imagepath, false);
                        $outputimage  =  $imageurl;
                        // Use the first image found.
                        break;
                    }
                }
            }
            }
        }
    
        /* Map data */
        $edooCategory->categoryId = $categoryId;
        $edooCategory->categoryName = $categoryName;
        $edooCategory->categoryDescription = $categoryDescription;
        $edooCategory->categorySummary = $categorySummary;
        $edooCategory->isVisible = $isVisible;
        $edooCategory->categoryUrl = $categoryUrl;
        $edooCategory->coverImage = $outputimage;
        $edooCategory->ImageUrl = $outputimage;
        $edooCategory->courses = $categoryCourses;
        $edooCategory->coursesCount = $categoryCoursesCount;
        $edooCategory->subcategories = $categorySubcategories;
        $edooCategory->subcategoriesCount = $categorySubcategoriesCount;
        return $edooCategory;
    
        }
    }

    public function edooGetExampleCategories($maxNum) {
        global $CFG, $DB;
    
        $edooCategories = $DB->get_records('course_categories', array(), $sort='', $fields='*', $limitfrom=0, $limitnum=$maxNum);
    
        $edooReturn = array();
        foreach ($edooCategories as $edooCategory) {
        $edooReturn[] = $this->edooGetCategoryDetails($edooCategory->id);
        }
        return $edooReturn;
    }

    public function edooGetExampleCategoriesIds($maxNum) {
        global $CFG, $DB;
    
        $edooCategories = $this->edooGetExampleCategories($maxNum);
    
        $edooReturn = array();
        foreach ($edooCategories as $key => $edooCategory) {
        $edooReturn[] = $edooCategory->categoryId;
        }
        return $edooReturn;
    }
}
