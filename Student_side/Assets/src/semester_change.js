// semester change
const Semester = document.getElementById('Semester');
Semester.addEventListener('focus', () => {
    const Course = document.getElementById('Course').value;
    jQuery.ajax({
        url: 'document',
        type: 'POST',
        data: "&course_code=" + Course,
        success: function(response) {
            const code = Array.from(response)[0];
            for (let i = 1; i <= code; i++) {
                if (i == 1) {
                    document.getElementById('Semester').options[i] = new Option("1st Semester", "1st Semester");
                } else if (i == 2) {
                    document.getElementById('Semester').options[i] = new Option("2nd Semester", "2nd Semester");
                } else if (i == 3) {
                    document.getElementById('Semester').options[i] = new Option("3rd Semester", "3rd Semester");
                } else {
                    document.getElementById('Semester').options[i] = new Option(i + "th Semester", i + "th Semester");
                }
            }
        }
    })
});