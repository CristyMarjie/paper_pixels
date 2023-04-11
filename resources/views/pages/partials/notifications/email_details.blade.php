@extends('pages.index',['title' => 'Tenants'])

@push('styles')
    <style>
         .letter-content{
            text-align: justify;
        }
        /*
        .address{
            word-wrap: break-word;
            width: 30%;
            text-align: justify;
        }

        .filename{
            width: 15%;
        }
        */



        @media (max-width:940px) {
            .notice-container {
               width: 80%;
            }

            .address{
                word-wrap: break-word;
                width: 90%;
                text-align: justify;
                flex-flow: nowrap;
            }
        }
    </style>
@endpush

@section('content')

<div class="container">
    <div class="card-body d-flex">
        <div class="d-flex justify-content-center">
            <!--begin::Card-->
            <div class="card card-custom notice-container" >
                <!--begin::Body-->
                <div class="card-body mr-5">
                    @include('pages.partials.notifications.email.email_content', ['data' => $details])
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
</div>


@endsection

@push('scripts')

@endpush
