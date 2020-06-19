@extends('base')

@section('content')
<div style="margin-top : 96px">
  <form class="form" id="new_post_form" enctype="multipart/form-data">
    <div class="form-group">
        <label >Titulo</label>
        <input type="text" id="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label >subtitulo</label>
        <input type="text" id="post_sub_title" class="form-control" >
    </div>

    <div class="form-group">
        <label >Contenido</label>
        <input type="text" id="post_content" class="form-control" >
    </div>

    <div class="form-group">
      <label >Url imagen</label>
      <input type="file" id="post_image" class="form-control" >
    </div>

    <input type="submit" id="btn_create" value="crear" class="btn btn-success">
  </form>
</div>



<script type="text/javascript">
  let form = document.getElementById('new_post_form')
  let post_title = document.getElementById('post_title')
  let post_sub_title = document.getElementById('post_sub_title')
  let post_content = document.getElementById('post_content')
  let post_image_url = ''

  form.addEventListener('submit' , function(e){
    e.preventDefault()
    
    let file = e.target[3].files[0]
    const metadata = { contentType: file.type };
    const task  =  firebase.child(file.name).put(file, metadata)
    task  
    .then(async snapshot => {
      post_image_url = await snapshot.ref.getDownloadURL()
      
      let data = {
      'post_title' : post_title.value,
      'post_sub_title' : post_sub_title.value,
      'post_content' : post_content.value,
      'post_image' : post_image_url
      }
      
      fetch('/post/new',{
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      credentials: "same-origin",
      method: 'POST',
      body: JSON.stringify(data)
    }).then(function(response){

        if(response.status == 200){
          window.location.href = '/post'
        }else{
          alert('el post no fue creado')
        }

    })
    })
    
  })

</script>
@endsection
