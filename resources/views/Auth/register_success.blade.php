@extends('_layouts.main')
@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card bg-light border-primary" style="border-radius: 20px">
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                                @php
                                    Session::forget('success');
                                @endphp
                            @endif
                            <p>
                                Register telah berhasil
                                <br>
                                Silahkan login di halaman berikut : <a href="{{ url('user/login') }}">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (Session::has('success'))
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href='{{ url('user/login') }}'">Login</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'), {});
            successModal.show();
        </script>
        @php
            Session::forget('success');
        @endphp
    @endif
@endsection
