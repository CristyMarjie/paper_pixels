@extends('pages.index',['title' => 'Tenants'])

@push('styles')
    <style>
        .letter-content{
            text-align: justify;
        }

        .address{
            word-wrap: break-word;
            width: 30%;
            text-align: justify;
        }

        .filename{
            width: 15%;
        }

        .notice-container{
            width: 60%;
        }


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
                        @switch($notice->notice_type)
                            @case('FIRST_NOTICE')
                                    @include('pages.partials.notifications.letters.first_notice',['data' => $notice])
                                @break
                            @case('SECOND_NOTICE')
                                    @include('pages.partials.notifications.letters.second_notice',['data' => $notice])
                                @break
                            @case('THIRD_NOTICE')
                                    @include('pages.partials.notifications.letters.third_notice',['data' => $notice])
                                @break
                            @case('TURNOVER_NOTICE')
                                    @include('pages.partials.notifications.letters.takeover_notice',['data' => $notice])
                                @break
                            @default
                        @endswitch
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
