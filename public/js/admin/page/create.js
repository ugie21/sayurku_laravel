$(document).ready(function(){
    const base_url = window.location.origin;

    CreateTextEditor();

    $(document).on("click", ".submit-data", function(e){
        e.preventDefault();
        $(".alert").remove();
        $(".invalid-feedback").remove();
        $("#submitForm input").remove('is-invalid');
        
        let content_textarea = tinymce.get('content_text');
        let content = content_textarea.getContent();

        $("#content").val(content);

        $("#submitForm").submit();
    });

    $("#submitForm").on("submit",function(e){
        e.preventDefault();

        let data = new FormData(this);
        
        $.ajax({
            url:base_url+"/page-management/store",
            type:'POST',
            data:data,
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend:function(){
                $(".submit-data").html('Inserting...').css('font-style','italic');
            },
            success:function(response){
                if(response.status === 201){
                    $('<div class="alert alert-info">'+response.message+'</div>').insertBefore('#submitForm');
                    setTimeout(function(){
                        window.location.href = base_url + '/page-management';
                    }, 2000);
                }else{
                    $('<div class="alert alert-danger">'+response.message+'</div>').insertBefore('#submitForm');
                }
            },
            error:function(response){
                if(response.status === 422){
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value){
                        $("#"+key).addClass('form-control is-invalid');
                        $('<div class="invalid-feedback">'+value+'</div>').insertAfter("#"+key);
                    });

                }
            },
            complete:function(){
                $(".submit-data").html('Submit').css('font-style','normal');
            }

        });
    });

    function CreateTextEditor(){
        tinymce.init({
            selector:'textarea'
        });
    }
});