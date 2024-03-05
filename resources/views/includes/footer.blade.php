<div>
    <!-- Back to top button -->
    <p class="icon float-end">
        <button id="back-to-top" class="btn btn-dark">
            <i class="bi bi-arrow-up-circle"></i>
          </button>
        <!-- JavaScript for back to top button -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            window.addEventListener('scroll', function() {
                var button = document.getElementById('back-to-top');
                if (window.pageYOffset > 100) {
                    button.style.display = 'block';
                } else {
                    button.style.display = 'none';
                }
            });

            document.getElementById('back-to-top').addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
    <p>
    <div class="container">
        <footer class="py-2 my-2">
            <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
        </footer>
    </div>
</div>
