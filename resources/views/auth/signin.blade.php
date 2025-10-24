<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
               
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100" style="background-image: url('../assets/img/bgcui.jpg'); background-size: cover; background-position: top;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-12 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                                                <div class="text-center">
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @error('message')
                                        <div class="alert alert-danger text-sm" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                               

                                <div class="card-body " style="border-radius: 15px; backdrop-filter: blur(15px); border-line:1px" >
                                    <h3 class="font-weight-black text-white display-6 text-center MB-3 py-4">LOGIN</h3>
                                    <form role="form" class="text-start" method="POST" action="sign-in">
                                        @csrf
                                        <label class="text-white">Username</label>
                                        <div class="mb-3">
                                            <input type="text" id="username" name="username" class="form-control"
                                                placeholder="Enter your email address"
                                                value="{{ old('username') ? old('username') : 'admin' }}"
                                                aria-label="username" aria-describedby="">
                                        </div>
                                        <label class="text-white">Password</label>
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password"
                                                value=""
                                                class="form-control" placeholder="Enter password" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                       
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                                            
                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>
