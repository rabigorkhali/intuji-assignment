<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Intuji Tech - Assignment of <a target="_blank" href="https://rabigorkhali.com.np"> Rabi Gorkhali </a></span>
    </div>
</footer>


<script>
    $(document).ready(function() {
        new DataTable('#eventTable', {
            layout: {
                bottomEnd: {
                    paging: {
                        boundaryNumbers: false
                    }
                }
            }
        });
    });
    function removeParametersFromUrl() {
        const url = new URL(window.location.href);
        url.search = '';
        window.history.replaceState({}, document.title, url);
    }
</script>