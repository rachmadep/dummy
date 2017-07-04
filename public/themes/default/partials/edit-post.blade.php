<form action="{{ url('ajax/update-post') }}" method="post">
<div class="panel panel-default panel-post animated" id="post{{ $post->id }}">
    <div class="panel-heading no-bg">
      <div class="post-author">
        <div class="user-avatar">
            <a href="{{ url($post->user->username) }}"><img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" title="{{ '@'.$post->user->username }}"></a>
        </div>
        <div class="user-post-details">
            <ul class="list-unstyled no-margin">
                <li>
                  <a href="{{ url($post->user->username) }}" class="user-name user">{{ '@'.$post->user->username }}</a>
                    @if($post->users_tagged->count() > 0)
                      {{ trans('common.with') }}
                      {{--*/ $post_tags = $post->users_tagged->pluck('name')->toArray() /*--}}
                      {{--*/ $post_tags_ids = $post->users_tagged->pluck('id')->toArray() /*--}}
                      @foreach($post->users_tagged as $key => $user)
                        @if($key==1)
                            {{ trans('common.and') }}
                            @if(count($post_tags)==1)
                                <a href="{{ url($user->username) }}"> {{ $user->name }}</a>
                            @else
                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="show-users-modal" data-html="true" data-heading="{{ trans('common.with_people') }}"  data-users="{{ implode(',', $post_tags_ids) }}" data-original-title="{{ implode('<br />', $post_tags) }}"> {{ count($post_tags).' '.trans('common.others') }}</a>
                            @endif
                            @break
                        @endif
                        <a href="{{ url($user->username) }}" class="user"> {{ array_shift($post_tags) }} </a>
                      @endforeach


                    @endif
                </li>
                <li>
                  <time class="post-time timeago" datetime="{{ $post->created_at }}" title="{{ $post->created_at }}">
                    {{ $post->created_at }}
                  </time>
            </ul>
        </div>
      </div>
      </div>
  <div class="panel-body">
      <div class="text-wrapper">

            <textarea name="title" id="" rows="1"  class="form-control">{{ $post->title }}</textarea>
            <textarea name="description" id="" rows="3"  class="form-control">{{ $post->description }}</textarea>
            <select name="mood" class="form-control createpost-form" id="createPost" style="font-family: 'FontAwesome', Helvetica;">
              <option value="{{ $post->mood }}" disabled selected>{{ $post->mood }}</option>
              <option value="&#xf118 Senang">&#xf118 Senang</option>
              <option value="&#xf11a Baik">&#xf11a Baik</option>
              <option value="&#xf119 Sedih">&#xf119 Sedih</option>
            </select>

            <input type="hidden"  name="post_id" value="{{ $post->id }}">
      </div>
  </div>
  <div class="panel-footer">
            <ul class="list-inline pull-right">
                <li><button type="submit" class="btn btn-submit btn-success">{{ trans('common.post') }}</button></li>
            </ul>

            <div class="clearfix"></div>
        </div>
</div>
 </form>
