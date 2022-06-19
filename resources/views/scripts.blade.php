<script src="js/anime.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    const header = $('#header-title') ?? null;

    if(header)
        $(document).ready((e) => {
            header.on('click', (e) => {
                anime({
                    targets: `#header-title`,
                    backgroundColor: 'red',
                    direction: 'alternate',
                    easing: 'easeInOutCirc'
                });
                // alert('entra');
            });
        });
</script>