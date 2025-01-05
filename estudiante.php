<?php
// Aqui va la conexi[on al mySQL
$student_semester = 0; 

function renderButton($semester, $current_semester) {
    if ($current_semester == 0 && $semester == 1) {
        echo "<button>Matricular en Semestre $semester</button>";
    } else if ($current_semester >= $semester) {
        echo "<button disabled>Semestre $semester</button>";
    } else {
        echo "<button disabled>Semestre $semester</button>";
    }
}
?>

<div>
    <p>Estado de matrícula:</p>
    <?php
    for ($i = 1; $i <= 8; $i++) { 
        renderButton($i, $student_semester);
    }
    ?>
</div>


