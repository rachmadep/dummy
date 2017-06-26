<!-- <div class="main-content"> -->
	<div class="container">
		<div class="row">

			<!-- List of user pages--><!-- /col-md-6 -->

			<!-- List of user groups-->

			<div class="col-md-8">
				<div class="post-filters pages-groups">

					<div class="panel panel-default">
						<div class="panel-heading no-bg panel-settings">
							<div class="pull-right">
								<a href="{{ url(Auth::user()->username.'/create-group') }}" class="btn btn-success">{{ trans('common.create_group') }}</a>
							</div>
							<h3 class="panel-title">
								{{ trans('messages.groups-manage') }}
							</h3>
						</div>
						<div class="panel-body">
							@if(count($groupPages))

							<ul class="list-group page-likes">
								@foreach($groupPages as $grouppage)
								<li class="list-group-item">
									<div class="pull-right">
										<span class="label label-default">{{ $grouppage->type }}</span>
									</div>
									<div class="connect-list">
										<div class="connect-link pull-left">

											<a href="{{ url($grouppage->username) }}">
												<img src=" @if($grouppage->timeline_id && $grouppage->avatar) {{ url('group/avatar/'.$grouppage->avatar) }} @else {{ url('group/avatar/default-group-avatar.png') }} @endif" alt="{{ $grouppage->name }}" title="{{ $grouppage->name }}">{{ $grouppage->name }}
											</a>
										</div>
										<div class="clearfix"></div>
									</div><!-- /connect-list -->
								</li>
								@endforeach
							</ul>
							@else
								<div class="alert alert-warning">
									{{ trans('messages.no_groups') }}
								</div>
							@endif
						</div>
					</div>

				</div><!-- /panel -->
			</div>
		</div><!-- /row -->
	</div>
<!-- </div> --><!-- /main-content -->
