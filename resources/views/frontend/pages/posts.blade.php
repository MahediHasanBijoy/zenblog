@extends('frontend.layout.app')

@section('content')
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
          <div class="row g-5">
            <div class="col-lg-8 offset-lg-2">
              <div class="row g-5" id="post-list">
                <div class="col" id="post-list">
                  
                </div>
              </div>
            </div>
  
          </div> <!-- End .row -->
        </div>
      </section> <!-- End Post Grid Section -->

      <script>
        getPosts();

        async function getPosts(){
            try{
                let url = '/get-posts';
                let response = await axios.get(url);
            
                response.data.forEach(item=>{
                    let singlePostUrl = `{{ route('posts.show', 'id') }}`.replace('id', item.id);

                    document.getElementById('post-list').innerHTML+=`<div class="post-entry-1">
                    <a href="${singlePostUrl}"><img src="{{asset('frontend/assets/img/post-landscape-2.jpg')}}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">${item.author}</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2><a href="${singlePostUrl}">${item.title}</a></h2>
                  </div>`; 
                })
            }catch(e){
                console.log(e);
            }
        }
      </script>


@endsection