<!-- <script>
        const openButtons = document.getElementsByClassName("getEnroll");
        const form = document.querySelector("[data-modal]");

        for (let i = 0; i < openButtons.length; i++) {
            openButtons[i].addEventListener("click", () => {
                form.showModal();
            });
        }

        function submitForm() {
            var enrollmentInput = document.getElementById("enrollmentInput");
            var enrollmentNo = enrollmentInput.value;
            window.location.href = "bonafide";
        }

        form.addEventListener("click", (e) => {
            const dialogDimensions = form.getBoundingClientRect();
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
            ) {
                form.close();
            }
        });

    </script> -->