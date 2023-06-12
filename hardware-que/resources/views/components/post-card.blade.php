@props(['post'])
<article class="first-art">
    <div class="first-art-div">
      <div class="first-img">
        <img src="/images/amd.png" alt="Amd cpu" class="first-image" />
        <div class="text-block">
          <h2>
            <a href="#" class="hover-underline-animation">
              {{ $post->title }}              
            </a>
          </h2>
        </div>
      </div>
    </div>
  </article>