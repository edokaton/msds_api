@extends('view.index')

@section('content')

	<style type="text/css" media="screen">
		body{
			background-image: url("{{ asset('img/pecahan/a.png') }}");
			background-size: cover;
		}
	</style>

	<div id="root"></div>

	@include('view.footer')

	<script type="text/javascript">

	</script>

	<script type="text/babel">
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		class LoginForm extends React.Component {
			render() {
				return (
				<div>
					<div className="login-modal">
						<div className="logo-wrapper">							
							<p>MSDS</p>
							<p>(MATERIAL SAFETY DATA SHEET)</p>
						</div>
						<div className="login-input-wrapper">
							<form id="login-form" role="form" method="POST" action="{{ route('login.check') }}">
								<input name="_token" value={CSRF_TOKEN} type="hidden" />
								<div className="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
									<label htmlFor="username">Username</label>
									<input type="text" name="username" id="username" className="form-control" placeholder="username" defaultValue="{{ old('username') }}" />
									@if ($errors->has('username'))
		                                <span className="help-block">
		                                    <strong>{{ $errors->first('username') }}</strong>
		                                </span>
		                            @endif
								</div>
								<div className="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label htmlFor="password">Password</label>
									<input type="password" name="password" id="password" className="form-control" placeholder="password" defaultValue="{{ old('password') }}" />
									@if ($errors->has('password'))
		                                <span className="help-block">
		                                    <strong>{{ $errors->first('password') }}</strong>
		                                </span>
		                            @endif
								</div>
								<button type="submit" className="btn btn-primary login-submit">Masuk</button>
							</form>
						</div>
					</div>
					<p className="copyright">Copyright &#169; MSDS</p>
					<p className="powered-by">Powered by Edo Katon Setiawan</p>
				</div>
				);
			}
		}

		ReactDOM.render(
			<LoginForm />,
			document.querySelector('#root')
		);
	</script>
@endsection