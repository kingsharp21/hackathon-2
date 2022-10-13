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
    return $students[$position-1]; 
}

$students = getStudents();

// print_r(sortStudents($students)); 

$sorted_student = sortStudents($students); //this variable contains the sort array.

echo '<br/>'; 

print_r(findStudentByPosition($sorted_student, 3)); // The student in the third position is : Array ( [fullName] => Solomon APPIER-SIGN [gender] => male [course] => Software Engineering [averageScore] => 95 [house] => 1 )

//testing other inputs
echo '<br/>';
print_r(findStudentByPosition($sorted_student, 6));
echo '<br/>';
print_r(findStudentByPosition($sorted_student, 1));

