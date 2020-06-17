<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    @if(Auth::user()->profile)
    <img src="{{asset('/storage/profile-img/'.Auth::user()->profile)}}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
    @endif
    </div>
    <div class="info">
      <a href="{{route('profile')}}" class="d-block">{{ Auth::user()->name }}</a>
    </div>
</div>