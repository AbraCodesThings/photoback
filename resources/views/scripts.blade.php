{{-- <script src="/js/anime.min.js"></script> --}}
<script src={{URL::asset("js/anime.min.js")}}></script>
<script src={{URL::asset("/js/jquery-3.6.0.min.js")}}></script>
<script src={{URL::asset("/js/bootstrap.bundle.min.js")}}></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<script>
    $(document).ready(function(){
        checkSearchParams();
        $('[name=search-options]').change(()=>{
            checkSearchParams();
        });
    })

    function checkSearchParams(){
        if($('#radio-tags').prop('checked') == true){
            $('#search-box').attr('placeholder', 'tags')
        }
        else if($('#radio-uploader').prop('checked') == true){
            $('#search-box').attr('placeholder', 'uploader name')
        }
        else if($('#radio-title').prop('checked') == true){
            $('#search-box').attr('placeholder', 'image title')
        }
    }
</script>
{{-- <script>
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
</script> --}}