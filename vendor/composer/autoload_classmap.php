<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Api\\Classes' => $baseDir . '/App/Api/Classes.php',
    'App\\Api\\GradeTypes' => $baseDir . '/App/Api/GradeTypes.php',
    'App\\Api\\SchoolSubjects' => $baseDir . '/App/Api/SchoolSubjects.php',
    'App\\Api\\Students' => $baseDir . '/App/Api/Students.php',
    'App\\Api\\Teachers' => $baseDir . '/App/Api/Teachers.php',
    'App\\Api\\Users' => $baseDir . '/App/Api/Users.php',
    'App\\Controllers\\Classes' => $baseDir . '/App/Controllers/Classes.php',
    'App\\Controllers\\GradeTypes' => $baseDir . '/App/Controllers/GradeTypes.php',
    'App\\Controllers\\Grades' => $baseDir . '/App/Api/undone/Grades.php',
    'App\\Controllers\\Groups' => $baseDir . '/App/Api/undone/Groups.php',
    'App\\Controllers\\Message' => $baseDir . '/App/Api/undone/Messages.php',
    'App\\Controllers\\News' => $baseDir . '/App/Api/undone/News.php',
    'App\\Controllers\\Notes' => $baseDir . '/App/Api/undone/Notes.php',
    'App\\Controllers\\SchoolSubjects' => $baseDir . '/App/Controllers/SchoolSubjects.php',
    'App\\Controllers\\Settings' => $baseDir . '/App/Api/undone/Settings.php',
    'App\\Controllers\\Students' => $baseDir . '/App/Controllers/Students.php',
    'App\\Controllers\\Teachers' => $baseDir . '/App/Controllers/Teachers.php',
    'App\\Controllers\\Users' => $baseDir . '/App/Controllers/Users.php',
    'App\\Lib\\Actions\\Classes\\ClassCreator' => $baseDir . '/App/Lib/Actions/Classes/ClassCreator.php',
    'App\\Lib\\Actions\\Classes\\ClassEditor' => $baseDir . '/App/Lib/Actions/Classes/ClassEditor.php',
    'App\\Lib\\Actions\\GradeTypes\\GradeTypeCreator' => $baseDir . '/App/Lib/Actions/GradeTypes/GradeTypeCreator.php',
    'App\\Lib\\Actions\\GradeTypes\\GradeTypeEditor' => $baseDir . '/App/Lib/Actions/GradeTypes/GradeTypeEditor.php',
    'App\\Lib\\Actions\\SchoolSubjects\\SchoolSubjectCreator' => $baseDir . '/App/Lib/Actions/SchoolSubject/SchoolSubjectCreator.php',
    'App\\Lib\\Actions\\SchoolSubjects\\SchoolSubjectEditor' => $baseDir . '/App/Lib/Actions/SchoolSubject/SchoolSubjectEditor.php',
    'App\\Lib\\Actions\\Students\\StudentCreator' => $baseDir . '/App/Lib/Actions/Students/StudentCreator.php',
    'App\\Lib\\Actions\\Students\\StudentEditor' => $baseDir . '/App/Lib/Actions/Students/StudentEditor.php',
    'App\\Lib\\Actions\\Students\\TeacherCreator' => $baseDir . '/App/Lib/Actions/Teachers/TeacherCreator.php',
    'App\\Lib\\Actions\\Students\\TeacherEditor' => $baseDir . '/App/Lib/Actions/Teachers/TeacherEditor.php',
    'App\\Lib\\Actions\\Users\\Authentication' => $baseDir . '/App/Lib/Actions/Users/Authentication.php',
    'App\\Lib\\Actions\\Users\\Registration' => $baseDir . '/App/Lib/Actions/Users/Registration.php',
    'App\\Lib\\Actions\\Users\\UserEditor' => $baseDir . '/App/Lib/Actions/Users/UserEditor.php',
    'App\\Lib\\Filters\\ClassFilter' => $baseDir . '/App/Lib/Filters/ClassFilter.php',
    'App\\Lib\\Filters\\GradeTypeFilter' => $baseDir . '/App/Lib/Filters/GradeTypeFilter.php',
    'App\\Lib\\Filters\\SchoolSubjectFilter' => $baseDir . '/App/Lib/Filters/SchoolSubjectFilter.php',
    'App\\Lib\\Filters\\StudentFilter' => $baseDir . '/App/Lib/Filters/StudentFilter.php',
    'App\\Lib\\Filters\\TeachersFilter' => $baseDir . '/App/Lib/Filters/TeachersFilter.php',
    'App\\Lib\\Filters\\UserFilter' => $baseDir . '/App/Lib/Filters/UserFilter.php',
    'App\\Lib\\Validators\\ContentValidator' => $baseDir . '/Core/Validators/ContentValidator.php',
    'App\\Lib\\Validators\\NumberValidator' => $baseDir . '/Core/Validators/NumberValidator.php',
    'App\\Lib\\Validators\\StringValidator' => $baseDir . '/Core/Validators/StringValidator.php',
    'App\\Model\\AdditionalSubject' => $baseDir . '/App/Models/AdditionalSubject.php',
    'App\\Model\\BehaviourGradeType' => $baseDir . '/App/Models/BehaviourGradeType.php',
    'App\\Model\\BehaviourNote' => $baseDir . '/App/Models/BehaviourNote.php',
    'App\\Model\\DefaultSchedule' => $baseDir . '/App/Models/DefaultSchedule.php',
    'App\\Model\\Grade' => $baseDir . '/App/Models/Grade.php',
    'App\\Model\\GradeType' => $baseDir . '/App/Models/GradeType.php',
    'App\\Model\\Group' => $baseDir . '/App/Models/Group.php',
    'App\\Model\\LessonData' => $baseDir . '/App/Models/LessonData.php',
    'App\\Model\\LessonSubject' => $baseDir . '/App/Models/LessonSubject.php',
    'App\\Model\\Message' => $baseDir . '/App/Models/Message.php',
    'App\\Model\\News' => $baseDir . '/App/Models/News.php',
    'App\\Model\\ParentContact' => $baseDir . '/App/Models/ParentContact.php',
    'App\\Model\\ScheduleDefault' => $baseDir . '/App/Models/ScheduleDefault.php',
    'App\\Model\\ScheduleDifferences' => $baseDir . '/App/Models/ScheduleDifferences.php',
    'App\\Model\\SchoolBreak' => $baseDir . '/App/Models/SchoolBreak.php',
    'App\\Model\\SchoolClass' => $baseDir . '/App/Models/SchoolClass.php',
    'App\\Model\\SchoolClassSubject' => $baseDir . '/App/Models/SchoolClassSubject.php',
    'App\\Model\\SchoolLesson' => $baseDir . '/App/Models/SchoolLesson.php',
    'App\\Model\\SchoolSubject' => $baseDir . '/App/Models/SchoolSubject.php',
    'App\\Model\\SemestralGrade' => $baseDir . '/App/Models/SemestralGrade.php',
    'App\\Model\\Student' => $baseDir . '/App/Models/Student.php',
    'App\\Model\\SubjectTeacher' => $baseDir . '/App/Models/SubjectTeacher.php',
    'App\\Model\\Teacher' => $baseDir . '/App/Models/Teacher.php',
    'App\\Model\\Trip' => $baseDir . '/App/Models/Trip.php',
    'App\\Model\\User' => $baseDir . '/App/Models/User.php',
    'App\\Provider\\ClassesProvider' => $baseDir . '/App/Providers/ClassesProvider.php',
    'App\\Provider\\GradeTypesProvider' => $baseDir . '/App/Providers/GradesTypesProvider.php',
    'App\\Provider\\GradesProvider' => $baseDir . '/App/Providers/undone/GradesProvider.php',
    'App\\Provider\\SchoolSubjectsProvider' => $baseDir . '/App/Providers/SchoolSubjectsProvider.php',
    'App\\Provider\\StudentsProvider' => $baseDir . '/App/Providers/StudentsProvider.php',
    'App\\Provider\\TeachersProvider' => $baseDir . '/App/Providers/TeachersProvider.php',
    'App\\Provider\\TripsProvider' => $baseDir . '/App/Providers/undone/TripsProvider.php',
    'App\\Provider\\UsersProvider' => $baseDir . '/App/Providers/UsersProvider.php',
    'ComposerAutoloaderInite6180dbdd575fd6b74cc00dfc3bb3c86' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInite6180dbdd575fd6b74cc00dfc3bb3c86' => $vendorDir . '/composer/autoload_static.php',
    'Core\\Action\\AbstractAction' => $baseDir . '/Core/Action/AbstractAction.php',
    'Core\\Action\\CreatorAction' => $baseDir . '/Core/Action/CreatorAction.php',
    'Core\\Action\\EditAction' => $baseDir . '/Core/Action/EditAction.php',
    'Core\\Config' => $baseDir . '/Core/Config.php',
    'Core\\Controller\\AdminController' => $baseDir . '/Core/Controller/AdminController.php',
    'Core\\Controller\\Controller' => $baseDir . '/Core/Controller/Controller.php',
    'Core\\Database\\Connection' => $baseDir . '/Core/Database/Connection.php',
    'Core\\Helpers\\DateFormatter' => $baseDir . '/Core/Helpers/DateFormatter.php',
    'Core\\Helpers\\Encrypter' => $baseDir . '/Core/Helpers/Encrypter.php',
    'Core\\Helpers\\Header' => $baseDir . '/Core/Helpers/Header.php',
    'Core\\Model\\AbstractModel' => $baseDir . '/Core/Model/AbstractModel.php',
    'Core\\Model\\ModelInterface' => $baseDir . '/Core/Model/ModelInterface.php',
    'Core\\Model\\PrimaryModelInterface' => $baseDir . '/Core/Model/PrimaryModelInterface.php',
    'Core\\Model\\SecondaryModelInterface' => $baseDir . '/Core/Model/SecondaryModelInterface.php',
    'Core\\Provider\\AbstractProvider' => $baseDir . '/Core/Providers/AbstractProvider.php',
    'Core\\Provider\\Provider' => $baseDir . '/Core/Providers/Provider.php',
    'Core\\Provider\\QueryAbstractProvider' => $baseDir . '/Core/Providers/QueryAbstractProvider.php',
    'Core\\Providers\\Filters\\BasicFilter' => $baseDir . '/Core/Providers/Filters/BasicFIlter.php',
    'Core\\Request\\DataCreator' => $baseDir . '/Core/Request/DataCreator.php',
    'Core\\Request\\DataValidator' => $baseDir . '/Core/Request/DataValidator.php',
    'Core\\Request\\Request' => $baseDir . '/Core/Request/Request.php',
    'Core\\Request\\Response' => $baseDir . '/Core/Request/Response.php',
    'Core\\Request\\Validator\\Post' => $baseDir . '/Core/Request/Validator/Post.php',
    'Core\\Request\\Validator\\Validator' => $baseDir . '/Core/Request/Validator/Validator.php',
    'Core\\Router' => $baseDir . '/Core/Router.php',
);
