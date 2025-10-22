"""
SQLAlchemy models for Moodle database tables
Maps to existing Moodle schema in bheem_academy_staging
"""
from sqlalchemy import Column, BigInteger, Integer, String, Text, Boolean, SmallInteger, Index, ForeignKey
from sqlalchemy.orm import relationship
from core.database import MoodleBase


class MoodleUser(MoodleBase):
    """Moodle user table - READ ONLY (users managed in ERP)"""
    __tablename__ = "mdl_user"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    auth = Column(String(20), default='manual')
    confirmed = Column(SmallInteger, default=0)
    deleted = Column(SmallInteger, default=0)
    suspended = Column(SmallInteger, default=0)
    username = Column(String(100), unique=True)
    password = Column(String(255))
    firstname = Column(String(100))
    lastname = Column(String(100))
    middlename = Column(String(255))
    email = Column(String(100))
    phone1 = Column(String(20))
    phone2 = Column(String(20))
    institution = Column(String(255))
    department = Column(String(255))
    address = Column(String(255))
    city = Column(String(120))
    country = Column(String(2))
    description = Column(Text)
    picture = Column(BigInteger, default=0)
    firstaccess = Column(BigInteger, default=0)
    lastaccess = Column(BigInteger, default=0)
    lastlogin = Column(BigInteger, default=0)
    currentlogin = Column(BigInteger, default=0)
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)


class Course(MoodleBase):
    """Course table"""
    __tablename__ = "mdl_course"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    category = Column(BigInteger, ForeignKey('public.mdl_course_categories.id'))
    sortorder = Column(BigInteger, default=0)
    fullname = Column(String(1333))
    shortname = Column(String(255))
    idnumber = Column(String(100))
    summary = Column(Text)
    summaryformat = Column(SmallInteger, default=1)
    format = Column(String(21), default='weeks')
    showgrades = Column(SmallInteger, default=1)
    startdate = Column(BigInteger, default=0)
    enddate = Column(BigInteger, default=0)
    visible = Column(SmallInteger, default=1)
    enablecompletion = Column(SmallInteger, default=0)
    completionnotify = Column(SmallInteger, default=0)
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)


class CourseCategory(MoodleBase):
    """Course category table"""
    __tablename__ = "mdl_course_categories"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    name = Column(String(255))
    idnumber = Column(String(100))
    description = Column(Text)
    descriptionformat = Column(SmallInteger, default=1)
    parent = Column(BigInteger, default=0)
    sortorder = Column(BigInteger, default=0)
    coursecount = Column(BigInteger, default=0)
    visible = Column(SmallInteger, default=1)
    timemodified = Column(BigInteger, default=0)


class Enrol(MoodleBase):
    """Enrollment instances"""
    __tablename__ = "mdl_enrol"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    enrol = Column(String(20), default='manual')
    status = Column(BigInteger, default=0)
    courseid = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    sortorder = Column(BigInteger, default=0)
    name = Column(String(255))
    enrolperiod = Column(BigInteger, default=0)
    enrolstartdate = Column(BigInteger, default=0)
    enrolenddate = Column(BigInteger, default=0)
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)


class UserEnrolment(MoodleBase):
    """User enrollment records"""
    __tablename__ = "mdl_user_enrolments"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    status = Column(BigInteger, default=0)
    enrolid = Column(BigInteger, ForeignKey('public.mdl_enrol.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    timestart = Column(BigInteger, default=0)
    timeend = Column(BigInteger, default=0)
    modifierid = Column(BigInteger, default=0)
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)


class Post(MoodleBase):
    """Blog posts table"""
    __tablename__ = "mdl_post"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    module = Column(String(20), default='blog')
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    courseid = Column(BigInteger, default=0)
    groupid = Column(BigInteger, default=0)
    moduleid = Column(BigInteger, default=0)
    coursemoduleid = Column(BigInteger, default=0)
    subject = Column(String(128))
    summary = Column(Text)
    content = Column(Text)
    uniquehash = Column(String(255))
    rating = Column(BigInteger, default=0)
    format = Column(BigInteger, default=1)
    attachment = Column(String(100))
    publishstate = Column(String(20), default='draft')
    lastmodified = Column(BigInteger, default=0)
    created = Column(BigInteger, default=0)
    usermodified = Column(BigInteger, default=0)


class Badge(MoodleBase):
    """Badge definitions"""
    __tablename__ = "mdl_badge"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    name = Column(String(255))
    description = Column(Text)
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)
    usercreated = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    usermodified = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    issuername = Column(String(255))
    issuerurl = Column(String(255))
    issuercontact = Column(String(255))
    expiredate = Column(BigInteger)
    expireperiod = Column(BigInteger)
    type = Column(SmallInteger, default=1)  # 1=site, 2=course
    courseid = Column(BigInteger)
    message = Column(Text)
    messagesubject = Column(Text)
    attachment = Column(SmallInteger, default=1)
    notification = Column(SmallInteger, default=1)
    status = Column(SmallInteger, default=0)  # 0=inactive, 1=active, 2=locked
    nextcron = Column(BigInteger)


class BadgeIssued(MoodleBase):
    """Issued badges to users"""
    __tablename__ = "mdl_badge_issued"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    badgeid = Column(BigInteger, ForeignKey('public.mdl_badge.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    uniquehash = Column(Text)
    dateissued = Column(BigInteger, default=0)
    dateexpire = Column(BigInteger)
    visible = Column(SmallInteger, default=1)
    issuernotified = Column(BigInteger)


class Assignment(MoodleBase):
    """Assignments table"""
    __tablename__ = "mdl_assign"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    course = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    name = Column(String(255))
    intro = Column(Text)
    introformat = Column(SmallInteger, default=1)
    alwaysshowdescription = Column(SmallInteger, default=0)
    nosubmissions = Column(SmallInteger, default=0)
    submissiondrafts = Column(SmallInteger, default=0)
    sendnotifications = Column(SmallInteger, default=0)
    sendlatenotifications = Column(SmallInteger, default=0)
    duedate = Column(BigInteger, default=0)
    allowsubmissionsfromdate = Column(BigInteger, default=0)
    grade = Column(BigInteger, default=100)
    timemodified = Column(BigInteger, default=0)
    requiresubmissionstatement = Column(SmallInteger, default=0)
    completionsubmit = Column(SmallInteger, default=0)
    cutoffdate = Column(BigInteger, default=0)
    teamsubmission = Column(SmallInteger, default=0)
    requireallteammemberssubmit = Column(SmallInteger, default=0)
    markingworkflow = Column(SmallInteger, default=0)
    markingallocation = Column(SmallInteger, default=0)


class AssignSubmission(MoodleBase):
    """Assignment submissions"""
    __tablename__ = "mdl_assign_submission"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    assignment = Column(BigInteger, ForeignKey('public.mdl_assign.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)
    status = Column(String(10))  # submitted, draft, new
    groupid = Column(BigInteger, default=0)
    attemptnumber = Column(BigInteger, default=0)
    latest = Column(SmallInteger, default=0)


class AssignGrades(MoodleBase):
    """Assignment grades"""
    __tablename__ = "mdl_assign_grades"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    assignment = Column(BigInteger, ForeignKey('public.mdl_assign.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)
    grader = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    grade = Column(Integer, default=0)
    attemptnumber = Column(BigInteger, default=0)


class Quiz(MoodleBase):
    """Quizzes table"""
    __tablename__ = "mdl_quiz"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    course = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    name = Column(String(255))
    intro = Column(Text)
    introformat = Column(SmallInteger, default=1)
    timeopen = Column(BigInteger, default=0)
    timeclose = Column(BigInteger, default=0)
    timelimit = Column(BigInteger, default=0)
    overduehandling = Column(String(16), default='autosubmit')
    graceperiod = Column(BigInteger, default=0)
    preferredbehaviour = Column(String(32), default='deferredfeedback')
    canredoquestions = Column(SmallInteger, default=0)
    attempts = Column(Integer, default=0)
    attemptonlast = Column(SmallInteger, default=0)
    grademethod = Column(SmallInteger, default=1)
    decimalpoints = Column(SmallInteger, default=2)
    questiondecimalpoints = Column(SmallInteger, default=-1)
    reviewattempt = Column(Integer, default=0)
    reviewcorrectness = Column(Integer, default=0)
    reviewmarks = Column(Integer, default=0)
    reviewspecificfeedback = Column(Integer, default=0)
    reviewgeneralfeedback = Column(Integer, default=0)
    reviewrightanswer = Column(Integer, default=0)
    reviewoverallfeedback = Column(Integer, default=0)
    questionsperpage = Column(BigInteger, default=1)
    navmethod = Column(String(16), default='free')
    shuffleanswers = Column(SmallInteger, default=1)
    sumgrades = Column(Integer, default=0)
    grade = Column(Integer, default=0)
    timecreated = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)
    password = Column(String(255))
    subnet = Column(String(255))
    browsersecurity = Column(String(32), default='-')
    delay1 = Column(BigInteger, default=0)
    delay2 = Column(BigInteger, default=0)
    showuserpicture = Column(SmallInteger, default=0)
    showblocks = Column(SmallInteger, default=0)
    completionattemptsexhausted = Column(SmallInteger)
    completionpass = Column(SmallInteger)


class QuizAttempt(MoodleBase):
    """Quiz attempts"""
    __tablename__ = "mdl_quiz_attempts"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    quiz = Column(BigInteger, ForeignKey('public.mdl_quiz.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    attempt = Column(Integer, default=0)
    uniqueid = Column(BigInteger)
    layout = Column(Text)
    currentpage = Column(BigInteger, default=0)
    preview = Column(SmallInteger, default=0)
    state = Column(String(16), default='inprogress')
    timestart = Column(BigInteger, default=0)
    timefinish = Column(BigInteger, default=0)
    timemodified = Column(BigInteger, default=0)
    timecheckstate = Column(BigInteger)
    sumgrades = Column(Integer)


class QuizGrade(MoodleBase):
    """Quiz final grades"""
    __tablename__ = "mdl_quiz_grades"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    quiz = Column(BigInteger, ForeignKey('public.mdl_quiz.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    grade = Column(Integer, default=0)
    timemodified = Column(BigInteger, default=0)


class Forum(MoodleBase):
    """Forums table"""
    __tablename__ = "mdl_forum"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    course = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    type = Column(String(20), default='general')
    name = Column(String(255))
    intro = Column(Text)
    introformat = Column(SmallInteger, default=1)
    assessed = Column(BigInteger, default=0)
    assesstimestart = Column(BigInteger, default=0)
    assesstimefinish = Column(BigInteger, default=0)
    scale = Column(BigInteger, default=1)
    maxbytes = Column(BigInteger, default=512000)
    maxattachments = Column(BigInteger, default=1)
    forcesubscribe = Column(SmallInteger, default=0)
    trackingtype = Column(SmallInteger, default=1)
    rsstype = Column(SmallInteger, default=0)
    rssarticles = Column(SmallInteger, default=0)
    timemodified = Column(BigInteger, default=0)
    warnafter = Column(BigInteger, default=0)
    blockafter = Column(BigInteger, default=0)
    blockperiod = Column(BigInteger, default=0)
    completiondiscussions = Column(Integer, default=0)
    completionreplies = Column(Integer, default=0)
    completionposts = Column(Integer, default=0)


class ForumDiscussion(MoodleBase):
    """Forum discussions"""
    __tablename__ = "mdl_forum_discussions"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    course = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    forum = Column(BigInteger, ForeignKey('public.mdl_forum.id'))
    name = Column(String(255))
    firstpost = Column(BigInteger)
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    groupid = Column(BigInteger, default=-1)
    assessed = Column(SmallInteger, default=1)
    timemodified = Column(BigInteger, default=0)
    usermodified = Column(BigInteger, default=0)
    timestart = Column(BigInteger, default=0)
    timeend = Column(BigInteger, default=0)
    pinned = Column(SmallInteger, default=0)


class ForumPost(MoodleBase):
    """Forum posts"""
    __tablename__ = "mdl_forum_posts"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    discussion = Column(BigInteger, ForeignKey('public.mdl_forum_discussions.id'))
    parent = Column(BigInteger, default=0)
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    created = Column(BigInteger, default=0)
    modified = Column(BigInteger, default=0)
    mailed = Column(SmallInteger, default=0)
    subject = Column(String(255))
    message = Column(Text)
    messageformat = Column(SmallInteger, default=0)
    messagetrust = Column(SmallInteger, default=0)
    attachment = Column(String(100))
    totalscore = Column(SmallInteger, default=0)
    mailnow = Column(BigInteger, default=0)


class GradeItem(MoodleBase):
    """Grade items"""
    __tablename__ = "mdl_grade_items"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    courseid = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    categoryid = Column(BigInteger)
    itemname = Column(String(255))
    itemtype = Column(String(30), default='manual')
    itemmodule = Column(String(30))
    iteminstance = Column(BigInteger)
    itemnumber = Column(BigInteger)
    iteminfo = Column(Text)
    idnumber = Column(String(255))
    calculation = Column(Text)
    gradetype = Column(SmallInteger, default=1)
    grademax = Column(Integer, default=100)
    grademin = Column(Integer, default=0)
    scaleid = Column(BigInteger)
    outcomeid = Column(BigInteger)
    gradepass = Column(Integer, default=0)
    multfactor = Column(Integer, default=1)
    plusfactor = Column(Integer, default=0)
    aggregationcoef = Column(Integer, default=0)
    aggregationcoef2 = Column(Integer, default=0)
    sortorder = Column(BigInteger, default=0)
    display = Column(BigInteger, default=0)
    decimals = Column(SmallInteger)
    hidden = Column(BigInteger, default=0)
    locked = Column(BigInteger, default=0)
    locktime = Column(BigInteger, default=0)
    needsupdate = Column(BigInteger, default=0)
    weightoverride = Column(SmallInteger, default=0)
    timecreated = Column(BigInteger)
    timemodified = Column(BigInteger)


class GradeGrade(MoodleBase):
    """Grade grades (actual grades for items)"""
    __tablename__ = "mdl_grade_grades"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    itemid = Column(BigInteger, ForeignKey('public.mdl_grade_items.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    rawgrade = Column(Integer)
    rawgrademax = Column(Integer, default=100)
    rawgrademin = Column(Integer, default=0)
    rawscaleid = Column(BigInteger)
    usermodified = Column(BigInteger)
    finalgrade = Column(Integer)
    hidden = Column(BigInteger, default=0)
    locked = Column(BigInteger, default=0)
    locktime = Column(BigInteger, default=0)
    exported = Column(BigInteger, default=0)
    overridden = Column(BigInteger, default=0)
    excluded = Column(BigInteger, default=0)
    feedback = Column(Text)
    feedbackformat = Column(BigInteger, default=0)
    information = Column(Text)
    informationformat = Column(BigInteger, default=0)
    timecreated = Column(BigInteger)
    timemodified = Column(BigInteger)


class Event(MoodleBase):
    """Calendar events"""
    __tablename__ = "mdl_event"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    name = Column(String(255))
    description = Column(Text)
    format = Column(SmallInteger, default=0)
    courseid = Column(BigInteger, default=0)
    groupid = Column(BigInteger, default=0)
    userid = Column(BigInteger, default=0)
    repeatid = Column(BigInteger, default=0)
    modulename = Column(String(20))
    instance = Column(BigInteger, default=0)
    eventtype = Column(String(20), default='user')
    timestart = Column(BigInteger, default=0)
    timeduration = Column(BigInteger, default=0)
    visible = Column(SmallInteger, default=1)
    uuid = Column(String(255), default='')
    sequence = Column(BigInteger, default=1)
    timemodified = Column(BigInteger, default=0)
    subscriptionid = Column(BigInteger)


class CourseModule(MoodleBase):
    """Course modules (activities)"""
    __tablename__ = "mdl_course_modules"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    course = Column(BigInteger, ForeignKey('public.mdl_course.id'))
    module = Column(BigInteger)  # References mdl_modules.id
    instance = Column(BigInteger)
    section = Column(BigInteger)
    idnumber = Column(String(100))
    added = Column(BigInteger, default=0)
    score = Column(SmallInteger, default=0)
    indent = Column(Integer, default=0)
    visible = Column(SmallInteger, default=1)
    visibleoncoursepage = Column(SmallInteger, default=1)
    visibleold = Column(SmallInteger, default=1)
    groupmode = Column(SmallInteger, default=0)
    groupingid = Column(BigInteger, default=0)
    completion = Column(SmallInteger, default=0)
    completiongradeitemnumber = Column(BigInteger)
    completionview = Column(SmallInteger, default=0)
    completionexpected = Column(BigInteger, default=0)
    showdescription = Column(SmallInteger, default=0)
    availability = Column(Text)
    deletioninprogress = Column(SmallInteger, default=0)


class CourseModulesCompletion(MoodleBase):
    """Course module completion tracking"""
    __tablename__ = "mdl_course_modules_completion"
    __table_args__ = {'schema': 'public'}

    id = Column(BigInteger, primary_key=True)
    coursemoduleid = Column(BigInteger, ForeignKey('public.mdl_course_modules.id'))
    userid = Column(BigInteger, ForeignKey('public.mdl_user.id'))
    completionstate = Column(SmallInteger, default=0)  # 0=incomplete, 1=complete, 2=complete_pass, 3=complete_fail
    viewed = Column(SmallInteger, default=0)
    overrideby = Column(BigInteger)
    timemodified = Column(BigInteger, default=0)
