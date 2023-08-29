@extends('layouts.app')

@section('content')

     <!-- section jumbotron -->
     <section class="jumbotron container-xl px-3 px-md-4 px-lg-5 mt-2 py-5 ">
        <div class="row">
            <div class="col-sm-3">
                <div>
                    <img style="height:auto; width: 100%;
                    border-radius: 20px;" alt="" src="https://avatars.githubusercontent.com/u/127045851?v=4" width="260" height="260" class="avatar avatar-user width-full border color-bg-default border border-secondary">
                </div>   
                <div class="player justify-content-end mt-5">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4Zjli1P13J5mmSCD5iKAXK?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
            </div>
            
            <div class="col-sm-9">
                <h1 class="fw-bold text-white" style="font-size: 2.8rem;">
                    Welcome to Portfolio by Michele Canini
                </h1>
                
                <div>
                    <div class="Box-body p-4 mt-5 border border-secondary" style="
                    border-radius: 20px;" >
                        
                        <article class="markdown-body entry-content container-lg f5" itemprop="text"><h3 dir="auto"><a id="user-content--hi-im-michelecanini-j-full-stack-web-dev" class="anchor" aria-hidden="true" href="#-hi-im-michelecanini-j-full-stack-web-dev"></a><g-emoji class="g-emoji" alias="wave" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44b.png">👋</g-emoji> Hi, I’m <a href="https://github.com/michelecanini">@michelecanini</a> J. Full-Stack Web Dev.</h3>
                            <ul dir="auto">
                                <li><g-emoji class="g-emoji" alias="eyes" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png">👀</g-emoji><span class="text-white"> I’m an INTJ with 1000 different interests.</span></li>
                                <li><span class="text-white">🌱 I’m currently learning code in BOOLEAN School.</span></li>
                                <li><g-emoji class="g-emoji" alias="mailbox" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f4eb.png">📫</g-emoji><span class="text-white"> How to reach =&gt; </span><a href="https://www.linkedin.com/in/michele-canini-1a71b2134/" rel="nofollow">Linkedin</a></li>
                            </ul>
                        </article>
                    </div>
                </div>   
                <div class="mt-3">   
                    <h5 class="col-sm-12 mt-5 fs-4">This Project: "Boolfolio" is built with Bootstrap 5 and Laravel 9.2 including Laravel breeze and blade. Contains some of the code projects executed with the Boolean school, and here you find my favorite playlist, that I listened to during this adventure.</h5>
                </div>
            </div>
        </div>
    </section>

     <!-- ciclo delle card -->
     <section class=" container">
        <div class="row justify-content-center">
        @foreach ($projects as $project)
            <div class="card col-12 col-md-4 m-3 text-white border border-secondary" style="width: 25rem; " >
                <div class="text-end mt-1"><span class="badge text-bg-info">{{ $project->type->name }}</span></div>
                <img src="{{ asset('storage/'.$project->thumb) }}" class="card-img-top mt-3" alt="{{ $project->title }}">
                <div class="card-body">
                    <h5 class="card-title text-black">{{ $project->title }}</h5>
                    <a href="{{ $project->github }}" target="_blank" class="btn btn-primary">GitHub</a>
                    <a href="{{ $project->demo }}" target="_blank" class="btn btn-secondary">Demo</a>
                </div>
            </div>
         @endforeach 
        </div>
    </section>

@endsection

