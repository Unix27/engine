<aside>
	<div class="inner-box">
		<div class="user-panel-sidebar">

			<div class="collapse-box">
				<h5 class="collapse-title no-border">
					{{ t('My account') }}&nbsp;
					<a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a>
				</h5>
				<div class="panel-collapse collapse show" id="MyClassified">
					<ul class="acc-list">
						<li>
							<a {!! ($pagePath=='') ? 'class="active"' : '' !!} href="{{ lurl('account') }}">
								<i class="icon-home"></i> {{ t('Personal Home') }}
							</a>
							<a {!! ($pagePath=='orders') ? 'class="active"' : '' !!} href="{{ lurl('account/orders') }}">
								<i class="icon-basket"></i> {{ t('My orders') }}
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /.collapse-box  -->

			<div class="collapse-box">
				<h5 class="collapse-title">
					{{ t('Menu') }}
					<a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a>
				</h5>
				<div class="panel-collapse collapse show" id="MyAds">
					<ul class="acc-list">
						<li>
							<a href="{{ lurl('account/terms-of-use') }}">
							    <i class="icon-docs"></i>
                                {{ trans('footer.Terms of Use') }}
							</a>
						</li>
						<li>
							<a href="{{ lurl('account/privacy-statement') }}">
							    <i class="icon-docs"></i>
                                {{ trans('footer.Privacy Policy') }}
							</a>
						</li>
						<li>
							<a href="{{ lurl('account/ios-terms') }}">
							    <i class="icon-docs"></i>
                                {{ trans('footer.iOS App - Special Terms') }}
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /.collapse-box  -->

			<!-- /.collapse-box  -->

		</div>
	</div>
	<!-- /.inner-box  -->
</aside>