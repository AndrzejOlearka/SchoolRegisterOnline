
CREATE TABLE IF NOT EXISTS users (
    id int AUTO_INCREMENT,
    email varchar (255) NOT NULL,
    password varchar (255),
    role tinyint(2) NOT NULL,
    verified boolean,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS settings (
    id int AUTO_INCREMENT,
    name int(10),
    role_id int (10) NOT NULL, 
    value text NOT NULL,
    description text,
    PRIMARY KEY (id),
    FOREIGN KEY (role_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS roles (
    id int AUTO_INCREMENT,
    name varchar (255) NOT NULL,
    description text,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS teachers (
    id int AUTO_INCREMENT,
    user_id integer(10) NOT NULL,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    sex enum (1, 2),
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
    class_id int (10) NOT NULL,
    teacher_id int (10) NOT NULL,
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
)

CREATE TABLE IF NOT EXISTS classes (
    id int AUTO_INCREMENT,
    number int(3) NOT NULL,
    department varchar(100) NOT NULL,
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
    class_id int(10) NOT NULL,
    birthday date,
    father varchar (255),
    mother varchar (255),
    PRIMARY KEY (id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
)

CREATE TABLE IF NOT EXISTS groups (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    class_id int (10) NOT NULL,
    teacher_id int (10),
    school_subject_id int (10),
    students text,
    PRIMARY KEY (id)
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

CREATE TABLE IF NOT EXISTS grade_types(
    id int AUTO_INCREMENT,
    mark varchar(1000) NOT NULL,
    type enum ('1', '2') NOT NULL,
    description varchar (255),
    weight int(10),
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS lesson_grades(
    id int AUTO_INCREMENT,
    grade_type_id int(10) NOT NULL,
    student_id int NOT NULL,
    teacher_id int(10) NOT NULL,
    school_subject_id int(10) NOT NULL,
    native_grade_id int,
    created_date date,
    updated_date date,
    PRIMARY KEY (id),
    FOREIGN KEY (grade_type_id) REFERENCES grade_types(id),
    FOREIGN KEY (school_subject_id) REFERENCES school_subjects(id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    FOREIGN KEY (student_id) REFERENCES students(id)
)

CREATE TABLE IF NOT EXISTS behaviuor_grades(
    id int AUTO_INCREMENT,
    grade_id varchar(255) NOT NULL,
    student_id int NOT NULL,
    teacher_id int NOT NULL,
    native_grade_id int,
    created_date date,
    updated_date date
    PRIMARY KEY (id),
    FOREIGN KEY (grade_id) REFERENCES grade_types(id),
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

CREATE TABLE IF NOT EXISTS default_schedules(
    id int AUTO_INCREMENT,
    class_id int NOT NULL,
    schedule text,
    description text,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS class_schedules(
    id int AUTO_INCREMENT,
    week int NOT NULL,
    class_id int NOT NULL,
    schedule text,
    description text,
    PRIMARY KEY (id)
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
    user_id int,
    parent enum ('mother', 'father', 'guardian', 'other') NOT NULL,
    email varchar(255),
    description text,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS trips(
    id int AUTO_INCREMENT,
    name varchar(1000) NOT NULL,
    teachers text NOT NULL,
    description text,
    students text,
    parents text,
    date_from date NOT NULL,
    date_to date NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS news(
    id int AUTO_INCREMENT,
    user_id int,
    subject varchar(1000) NOT NULL,
    content text NOT NULL,
    created_date date,
    updated_date date,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS messages(
    id int AUTO_INCREMENT,
    user_id int,
    template_id int,
    subject varchar (1000) NOT NULL,
    content text NOT NULL,
    recipients text NOT NULL,
    created_date date,
    updated_date date,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS templates(
    id int AUTO_INCREMENT,
    name varchar (255),
    message text
)

CREATE TABLE IF NOT EXISTS school_lessons(
    number int,
    date_start time,
    date_end time,
    UNIQUE KEY (number)
)
    
CREATE TABLE IF NOT EXISTS school_breaks(
    number tinyint,
    date_start time,
    date_end time,
    UNIQUE KEY (number)
)

CREATE TABLE IF NOT EXISTS lessons_data(
    id int AUTO_INCREMENT,
    class_id int NOT NULL,
    school_day_id int NOT NULL,
    subject varchar(1000),
    description text,
    data text,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS school_weeks(
    week int,
    date_from date NOT NULL,
    date_to date NOT NULL,
    UNIQUE KEY (week)
)

CREATE TABLE IF NOT EXISTS school_days(
    day int,
    week int NOT NULL,
    date date NOT NULL,
    weekday char (20) NOT NULL,
    UNIQUE KEY (day)
)

CREATE TABLE IF NOT EXISTS class_rooms(
    id int AUTO_INCREMENT,
    number smallint NOT NULL,
    description text,
    teachers text,
    PRIMARY KEY (id)
)

CREATE TABLE IF NOT EXISTS frequency(
    number tinyint,
    date_start time,
    date_end time,
    UNIQUE KEY (number)
)
    


