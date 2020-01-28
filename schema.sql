
CREATE TABLE IF NOT EXISTS users (
    id int AUTO_INCREMENT,
    email varchar (255) NOT NULL,
    password varchar (255),
    role tinyint(2) NOT NULL,
    verified boolean,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS teachers (
    id int AUTO_INCREMENT,
    user_id integer(10) NOT NULL,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    sex int (1),
    school_subjects varchar(255),
    class_tutor int (10),
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS school_subjects (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS school_subjects_teachers(
    school_subject_id int (10) NOT NULL,
    teacher_id int (10) NOT NULL,
    teacher_main boolean,
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
)

CREATE TABLE IF NOT EXISTS classes (
    id int AUTO_INCREMENT,
    number int(1) NOT NULL,
    department varchar(1),
    class_tutor int(10),
    profile_id int(10),
    default_year int(4),
    PRIMARY KEY (id),
    FOREIGN KEY (class_tutor) REFERENCES teachers(id)
)

CREATE TABLE IF NOT EXISTS students (
    id int AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    sex int (1),
    class_id int NOT NULL(10),
    birthday date,
    father varchar (255),
    mother varchar (255)
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
)

CREATE TABLE IF NOT EXISTS groups (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    class_id int (10),
    teacher_id int (10),
    school_subject_id (10)
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
)

CREATE TABLE IF NOT EXISTS class_school_subjects(
    school_subject_id int(10) NOT NULL,
    class_id int(10) NOT NULL,
    teacher_id int(10) NOT NULL,
    group_id int(10),
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id),
    FOREIGN KEY (class_id) REFERENCES classes(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    FOREIGN KEY (group_id) REFERENCES groups(id)
)

CREATE TABLE IF NOT EXISTS grades_types(
    id int AUTO_INCREMENT,
    type varchar(1000) NOT NULL,
    role varchar(20) NOT NULL,
    usage varchar(20) NOT NULL,
    marks varchar(1000) NOT NULL,
    weight varchar(1000),
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS grades(
    id int AUTO_INCREMENT,
    weight varchar(255),
    student_id int NOT NULL,
    school_subject_id int(10) NOT NULL,
    teacher_id int(10) NOT NULL,
    group_id int(10),
    native_grade_id int,
    date date,
    PRIMARY KEY (id)
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    FOREIGN KEY (group_id) REFERENCES groups(id),
    FOREIGN KEY (student_id) REFERENCES students(id)
)

CREATE TABLE IF NOT EXISTS behaviuor_notes(
    id int AUTO_INCREMENT,
    weight varchar(255),
    student_id int NOT NULL,
    teacher_id int NOT NULL,
    date date,
    PRIMARY KEY (id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
)

CREATE TABLE IF NOT EXISTS semestral_grades(
    id int AUTO_INCREMENT,
    student_id int NOT NULL,
    school_subject int NOT NULL,
    grade_type_id int NOT NULL,
    semestr tinyint,
    FOREIGN KEY (student_id) REFERENCES students(id)
)

CREATE TABLE IF NOT EXISTS additional_school_subjects(
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    school_subject_id int,
    teacher_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id)
)

CREATE TABLE IF NOT EXISTS classes_schedule_default(
    class_id int NOT NULL
    monday text,
    tuesday text,
    wednesday text,
    thursday text,
    friday text,
    saturday text,
    sunday text,
    FOREIGN KEY (class_id) REFERENCES classes(id)
    
)

CREATE TABLE IF NOT EXISTS classes_schedule_differences(
    class_id int NOT NULL,
    date date NOT NULL,
    differences text,
    FOREIGN KEY (class_id) REFERENCES classes(id)
)

CREATE TABLE IF NOT EXISTS lessons_subjects(
    id int AUTO_INCREMENT,
    class_id int NOT_NULL,
    school_subject_id int NOT NULL,
    teacher_id int NOT NULL,
    group_id int NOT NULL,
    subject varchar(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES classes(id),
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    FOREIGN KEY (group_id) REFERENCES groups(id)
)

CREATE TABLE IF NOT EXISTS parents_contacts(
    id int AUTO_INCREMENT,
    student_id int NOT NULL,
    parent varchar(255),
    email varchar(255),
    description text,
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
)

CREATE TABLE IF NOT EXISTS trips(
    id int AUTO_INCREMENT,
    members tinyint,
    description text,
    date_start date,
    date_end date,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS classes_trips(
    trip_id int,
    class_id int,
    FOREIGN KEY (trip_id) REFERENCES trips(id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
)

CREATE TABLE IF NOT EXISTS news(
    id int AUTO_INCREMENT,
    user_id int,
    name varchar(255) NOT NULL,
    description text NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS messages(
    id int AUTO_INCREMENT,
    user_id int,
    recipients_ids varchar(1000),
    template_id varchar (255),
    subject varchar (255) NOT NULL,
    message text NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS templates(
    id int AUTO_INCREMENT,
    name varchar (255),
    message text
)

CREATE TABLE IF NOT EXISTS school_lessons(
    id int AUTO_INCREMENT,
    number int,
    date_start time,
    date_end time,
    PRIMARY KEY (id)
)
    
CREATE TABLE IF NOT EXISTS school_breaks(
    id int AUTO_INCREMENT,
    number int,
    date_start time,
    date_end time,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS frequency(
    class_id int AUTO_INCREMENT,
    number int,
    date_start time,
    date_end time,
    PRIMARY KEY (id)
)
    


CREATE TABLE IF NOT EXISTS lessons_data(
    class_id int,
    week tinyint,
    data text //

)