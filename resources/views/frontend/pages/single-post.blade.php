@extends('frontend.layout.app')

@section('content')
<section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
            <input type="hidden" id="post-id" value="{{$id}}">
            <div class="post-meta"><span class="date" id="author"></span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
            <h1 class="mb-5" id="title"></h1>

            <figure class="my-4">
              <img src="{{asset("frontend/assets/img/post-landscape-1.jpg")}}" alt="" class="img-fluid">
              <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, odit? </figcaption>
            </figure>
            <p id="content">

            </p>
            
          </div><!-- End Single Post Content -->

          <!-- ======= Comments ======= -->
          <div class="comments">
            <h5 class="comment-title py-4" id="comment-number"></h5>
            <div id="comment-list">

            </div>
          </div><!-- End Comments -->

          <!-- ======= Comments Form ======= -->
          <div class="row justify-content-center mt-5">

            <div class="col-lg-12">
              <h5 class="comment-title">Leave a Comment</h5>
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <label for="comment-name">Name</label>
                  <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                </div>
                <div class="col-lg-6 mb-3">
                  <label for="comment-email">Email</label>
                  <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                </div>
                <div class="col-12 mb-3">
                  <label for="comment-message">Message</label>

                  <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                </div>
                <div class="col-12">
                  <input type="submit" class="btn btn-primary" value="Post comment">
                </div>
              </div>
            </div>
          </div><!-- End Comments Form -->

        </div>
      </div>
    </div>
  </section>

  <script>
    getPost();

    async function getPost(){
        try{
                let id = document.getElementById('post-id').value;
                let url = '/single-post/'+id;
                let response = await axios.get(url);
                document.getElementById('author').innerHTML = response.data.post.author;
                document.getElementById('title').innerHTML = response.data.post.title;
                document.getElementById('content').innerHTML = response.data.post.content;
                document.getElementById('comment-number').innerHTML = response.data.comments.length+' Comments';

                response.data.comments.forEach(item=>{
                    document.getElementById('comment-list').innerHTML += `<div class="comment d-flex mb-4">
              <div class="flex-shrink-0">
                <div class="avatar avatar-sm rounded-circle">
                  <img class="avatar-img" src="{{asset("frontend/assets/img/person-5.jpg")}}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="flex-grow-1 ms-2 ms-sm-3">
                <div class="comment-meta d-flex align-items-baseline">
                  <h6 class="me-2">${item.name}</h6>
                  <span class="text-muted">2d</span>
                </div>
                <div class="comment-body">
                  ${item.comment}
                </div>
              </div>
            </div>`;
                })
                console.log(response.data);

            }catch(e){
                console.log(e);
            }
    }
  </script>
@endsection