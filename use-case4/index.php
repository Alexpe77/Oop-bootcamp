<?php

function calculateAverageGrade($group) {
    $totalGrades = 0;
    $studentsCount = count($group);

    foreach ($group as $students) {
        $totalGrades += $students['grade'];
    }

    return $totalGrades / $studentsCount;

}

function moveStudent($students, &$group1, &$group2) {
    $indexStudents = array_search($students, $group1);

    if ($indexStudents !== false) {
        $movedStudent = array_splice($group1, $indexStudents, 1)[0];
        $group2[] = $movedStudent;

        return true;
    }

   return false;
}

$group1 = [
    [ 'name' => 'Harry', 'grade' => 12],
    [ 'name' => 'Jeanne', 'grade' => 16],
    [ 'name' => 'Isaac', 'grade' => 10],
    [ 'name' => 'Elora', 'grade' => 14],
    [ 'name' => 'Charles', 'grade' => 18],
    [ 'name' => 'Edwige', 'grade' => 8],
    [ 'name' => 'Ronald', 'grade' => 15],
    [ 'name' => 'Leo', 'grade' => 6],
    [ 'name' => 'Marie', 'grade' => 11],
    [ 'name' => 'Hector', 'grade' => 7]
];

$group2 =  [
    [ 'name' => 'Georges', 'grade' => 4],
    [ 'name' => 'Irma', 'grade' => 10],
    [ 'name' => 'Louis', 'grade' => 7],
    [ 'name' => 'Jean', 'grade' => 19],
    [ 'name' => 'Louise', 'grade' => 11],
    [ 'name' => 'Gerald', 'grade' => 16],
    [ 'name' => 'Ginette', 'grade' => 14],
    [ 'name' => 'Albert', 'grade' => 2],
    [ 'name' => 'Lea', 'grade' => 12],
    [ 'name' => 'Napoléon', 'grade' => 20]
];

$averageGroup1 = calculateAverageGrade($group1);
$averageGroup2 = calculateAverageGrade($group2);

echo "Average grade for group 1 : " . number_format($averageGroup1, 2) . "<br>";
echo "Average grade for group 2 : $averageGroup2 <br>";

$maxGroup1 = max($group1);
$minGroup2 = min($group2);

moveStudent($maxGroup1, $group1, $group2);
moveStudent($minGroup2, $group2, $group1);

$newAverageGroup1 = calculateAverageGrade($group1);
$newAverageGroup2 = calculateAverageGrade($group2);

echo "New average grade for group 1 : " . number_format($newAverageGroup1, 2) . "<br>";
echo "New average grade for group 2 : $newAverageGroup2 <br>";
?>