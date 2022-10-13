<?php
/**
 * Set of PHP functions that fetches students from an endpoint, sorts them and returns a student at a given position
 *
 * @return array
 */
function getStudents(): array
{
    $curl = curl_init('https://d68b3d3a-38f9-4da4-9acf-5b4a29ccc098.mock.pstmn.io/students');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($curl), true);
    return $response['data'];
}

function sortStudents(array $students): array
{
    //my code
    usort($students,'DescSort');
    return $students;

}
// i used this function as a call back function for usort() in the sortStudents function
function DescSort($val1,$val2)
{
    if ($val1['averageScore'] == $val2['averageScore']) return 0;
    return ($val1['averageScore'] < $val2['averageScore']) ? 1 : -1;
}


function findStudentByPosition(array $students, int $position): array
{
    // edit the code below
    return $students[$position];
}

$students = getStudents();

print_r(sortStudents($students)); // this prints out the sorted array from 100 - ....

echo '<br/>'; // i inserted this to seperate the first print_r from the second ::

print_r(findStudentByPosition($students, 3)); // The student in the third position is : Array ( [fullName] => Nana Adomanko [gender] => female [course] => Sales [averageScore] => 88 [house] => 4 )

