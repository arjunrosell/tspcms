<div>
    <div x-data="initData">
        <div class="mb-11">
            <div class="mb-4 ">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Audit Logs
                </h2>
            </div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('analytics.donations') }}"
                            class="inline-flex items-center text-xs font-normal text-gray-600 hover:text-primary-red dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('audit.index') }}"
                                class="text-xs font-normal text-gray-600 ms-1 hover:text-primary-red md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Audit Logs
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-xs font-normal text-gray-600 ms-1 md:ms-2 dark:text-gray-400">Index</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>


        <style>
            .table-responsive {
                overflow-x: auto;
                margin-bottom: 1.5rem;
                -webkit-overflow-scrolling: touch;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background-color: #ffffff;
                border: 1px solid #dee2e6;
                border-radius: 0.25rem;
            }

            th,
            td {
                padding: 12px;
                text-align: left;
                border: 1px solid #dee2e6;
            }

            th {
                background-color: #007bff;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            @media (max-width: 768px) {

                th,
                td {
                    padding: 8px;
                    font-size: 14px;
                }
            }

            @media (max-width: 576px) {

                th,
                td {
                    display: block;
                    text-align: right;
                    padding-left: 50%;
                    position: relative;
                }

                th::before,
                td::before {
                    content: attr(data-label);
                    position: absolute;
                    left: 10px;
                    width: calc(50% - 20px);
                    padding-right: 10px;
                    white-space: nowrap;
                    text-align: left;
                }

                td {
                    text-align: left;
                    padding-left: 10px;
                }
            }
        </style>

        <table class="table-responsive">
            {{-- <thead>
                <tr>
                    <th>ID</th>
                    <th>AUDIT</th>
                    <th>AUDIT DATE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $rs)
                    <tr>
                        <td>{{ $rs->id }}</td>
                        <td>{{ $rs->audit }}</td>
                        <td>{{ date('Y-m-d h:i', strtotime($rs->created_at)) }}</td>
                    </tr>
                @endforeach

            </tbody> --}}
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Audit</th>
                    <th class="border px-4 py-2">Audit Date</th>
                    <th class="border px-4 py-2">User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td class="border px-4 py-2">{{ $log->id }}</td>
                        <td class="border px-4 py-2">{{ $log->audit }}</td>
                        <td>{{ \Carbon\Carbon::parse($log->audit_date)->format('Y-m-d (h:i A)') }}</td>
                        <td class="border px-4 py-2">{{ $log->user?->email ?? 'System' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $logs->links() }}
        </div>
    </div>

</div>
