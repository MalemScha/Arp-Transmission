@extends('layouts.main') 
@section('title', 'Lines')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        {{-- <i class="ik ik-users bg-blue"></i> --}}
                        <div class="d-inline">
                            <h5>{{ __('Lines')}}</h5>
                            <span>{{ __('List of lines')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Lines')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Lines')}}</h3></div>
                    <div class="card-body">
                        <table id="user_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Line Name')}}</th>
                                    <th>{{ __('Line ID')}}</th>
                                    <th>{{ __('Number Of Tower')}}</th>
                                    <th>{{ __('Action')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!--server side users table script-->
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
    <script>
        (function($) {
            "use strict";
            // Roles data table
            $(document).ready(function() {

                var searchable = [];
                var selectable = [];
                var dTable = $("#user_table").DataTable({
                    order: [],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    processing: true,
                    responsive: false,
                    serverSide: true,
                    processing: true,
                    language: {
                        processing:
                            '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
                    },
                    scroller: {
                        loadingIndicator: false
                    },
                    pagingType: "full_numbers",
                    dom:
                        "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                    ajax: {
                        url: "line/get-list",
                        type: "get"
                    },
                    columns: [
                        /*{data:'serial_no', name: 'serial_no'},*/
                        {
                            data: "name",
                            name: "name"
                        },
                        { data: "line_id", name: "line_id" },
                        { data: "tower_no", name: "tower_no" },
                        { data: "action", name: "action" }
                    ],
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm btn-info",
                            title: "Lines",
                            header: false,
                            footer: true,
                            exportOptions: {
                                // columns: ':visible'
                            }
                        },
                        {
                            extend: "csv",
                            className: "btn-sm btn-success",
                            title: "Lines",
                            header: false,
                            footer: true,
                            exportOptions: {
                                // columns: ':visible'
                            }
                        },
                        {
                            extend: "excel",
                            className: "btn-sm btn-warning",
                            title: "Lines",
                            header: false,
                            footer: true,
                            exportOptions: {
                                // columns: ':visible',
                            }
                        },
                        {
                            extend: "pdf",
                            className: "btn-sm btn-primary",
                            title: "Lines",
                            pageSize: "A2",
                            header: false,
                            footer: true,
                            exportOptions: {
                                // columns: ':visible'
                            }
                        },
                        {
                            extend: "print",
                            className: "btn-sm btn-default",
                            title: "Lines",
                            // orientation:'landscape',
                            pageSize: "A2",
                            header: true,
                            footer: false,
                            orientation: "landscape",
                            exportOptions: {
                                // columns: ':visible',
                                stripHtml: false
                            }
                        }
                    ],
                    initComplete: function() {
                        var api = this.api();
                        api.columns(searchable).every(function() {
                            var column = this;
                            var input = document.createElement("input");
                            input.setAttribute(
                                "placeholder",
                                $(column.header()).text()
                            );
                            input.setAttribute(
                                "style",
                                "width: 140px; height:25px; border:1px solid whitesmoke;"
                            );

                            $(input)
                                .appendTo($(column.header()).empty())
                                .on("keyup", function() {
                                    column
                                        .search($(this).val(), false, false, true)
                                        .draw();
                                });

                            $("input", this.column(column).header()).on(
                                "click",
                                function(e) {
                                    e.stopPropagation();
                                }
                            );
                        });

                        api.columns(selectable).every(function(i, x) {
                            var column = this;

                            var select = $(
                                '<select style="width: 140px; height:25px; border:1px solid whitesmoke; font-size: 12px; font-weight:bold;"><option value="">' +
                                    $(column.header()).text() +
                                    "</option></select>"
                            )
                                .appendTo($(column.header()).empty())
                                .on("change", function(e) {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                    e.stopPropagation();
                                });

                            $.each(dropdownList[i], function(j, v) {
                                select.append(
                                    '<option value="' + v + '">' + v + "</option>"
                                );
                            });
                        });
                    }
                });

            })
        })(jQuery);
    </script>
    @endpush
@endsection