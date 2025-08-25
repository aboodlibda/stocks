<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_coupons_table">
    <thead style="background-color: #abb9c7">
    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0 ">
        <th class="text-dark min-w-100px">{{'name'}}</th>
        <th class="text-dark min-w-100px">{{'code'}}</th>
        <th class="text-dark min-w-100px">{{'date'}}</th>
        <th class="text-dark min-w-100px">{{'turnover'}}</th>
        <th class="text-dark min-w-100px">{{'volume'}}</th>
        <th class="text-dark min-w-100px">{{'close'}}</th>
        <th class="text-dark min-w-100px">{{'low'}}</th>
        <th class="text-dark min-w-100px">{{'high'}}</th>
        <th class="text-dark min-w-100px">{{'open'}}</th>
        {{--                            <th class="text-dark text-end min-w-70px">{{trans('dashboard_trans.Actions')}}</th>--}}
    </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
    @forelse($sectors as $sector)
        <tr data-coupon-id="{{ $sector->id }}">
            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->name}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->code}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->date}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->turnover}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->volume}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->close}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->low}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->high}}</span>
                    </div>
                </div>
            </td>

            <td>
                <div class="text-center pe-0">
                    <div class="ms-5">
                        <span class="text-gray-800">{{$sector->open}}</span>
                    </div>
                </div>
            </td>



            {{--                                <td class="text-end">--}}
            {{--                                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{trans('dashboard_trans.Actions')}}--}}
            {{--                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>--}}
            {{--                                    <!--begin::Menu-->--}}
            {{--                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">--}}
            {{--                                        <!--begin::Menu item-->--}}
            {{--                                        <div class="menu-item px-3">--}}
            {{--                                            <a href="{{route('portfolios.edit',$sector)}}" class="menu-link px-3">{{trans('dashboard_trans.Edit')}}</a>--}}
            {{--                                        </div>--}}
            {{--                                        <!--end::Menu item-->--}}
            {{--                                        <!--begin::Menu item-->--}}
            {{--                                        <div class="menu-item px-3">--}}
            {{--                                            <a href="#" class="menu-link px-3" data-kt-ecommerce-coupons-filter="delete_row">{{trans('dashboard_trans.Delete')}}</a>--}}
            {{--                                        </div>--}}
            {{--                                        <!--end::Menu item-->--}}
            {{--                                    </div>--}}
            {{--                                    <!--end::Menu-->--}}
            {{--                                </td>--}}
        </tr>
        @empty
            <tr class="text-center">
                <td colspan="9" >لم يتم العثور على نتائج</td>
            </tr>
        @endforelse
    </tbody>
</table>
{{$sectors->links()}}
