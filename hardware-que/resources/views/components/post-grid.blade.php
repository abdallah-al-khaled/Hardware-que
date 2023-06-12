@props(['post'])
<div class="flex-width">
<article class="post-pre flex">
    <div class="post-thumb">
       
      <img
        class="img"
        src="/images/AMD-EPYC-low_res-scale-6_00x-Custom.png"
      />
    </div>
    <div class="post-contant flex-col">
      <h2>
        <a href="#"
          >
          {{$post->title}}
          </a>
      </h2>
      <footer>
        {{--
        <h4 style="color: aliceblue">Hardware</h4>
        --}}
      </footer>
    </div>
    
  </article>
</div>