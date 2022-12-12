{{-- <script src="/js/anime.min.js"></script> --}}
<script src={{URL::asset("js/anime.min.js")}}></script>
<script src={{URL::asset("/js/jquery-3.6.0.min.js")}}></script>
<script src={{URL::asset("/js/bootstrap.bundle.min.js")}}></script>
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