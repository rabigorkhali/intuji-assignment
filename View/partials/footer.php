<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Assignment of <a target="_blank" href="https://rabigorkhali.com.np"> Rabi Gorkhali </a></span>
    </div>
</footer>

<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
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
</script>