<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    @lang('app.id')
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    @lang('modules.order.amount')
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    @lang('modules.order.paymentMethod')
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    @lang('modules.order.transactionId')
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    @lang('modules.order.orderNumber')
                                </th>
                                <th scope="col"
                                    class="py-2.5 px-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-right">
                                    @lang('app.dateTime')
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700" wire:key='customer-list-{{ microtime() }}'>

                            @forelse ($payments as $item)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" wire:key='customer-{{ $item->id . rand(1111, 9999) . microtime() }}' wire:loading.class.delay='opacity-10'>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->remaining+1 }}
                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ currency_format($item->amount) }}
                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white flex items-center gap-1">

                                    @switch($item->payment_method)
                                        @case('cash')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                                        </svg>
                                        {{ __('modules.order.' . $item->payment_method) }}
                                            @break
                                        @case('card')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                        </svg>
                                        {{ __('modules.order.' . $item->payment_method) }}
                                        @break
                                        @case('upi')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                                <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z"/>
                                                <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z"/>
                                                <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z"/>
                                                <path d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z"/>
                                                <path d="M12 9h2V8h-2z"/>
                                            </svg>
                                          
                                            {{ __('modules.order.' . $item->payment_method) }}
                                            @break
                                        @case('stripe')
                                        <span class="inline-flex items-center">
                                            <svg version="1.1" height="21" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 468 222.5" style="enable-background:new 0 0 468 222.5;" xml:space="preserve">
                                                <style type="text/css">
                                                    .ststr0{fill-rule:evenodd;clip-rule:evenodd;fill:#635BFF;}
                                                </style>
                                                <g>
                                                    <path class="ststr0" d="M414,113.4c0-25.6-12.4-45.8-36.1-45.8c-23.8,0-38.2,20.2-38.2,45.6c0,30.1,17,45.3,41.4,45.3
                                                        c11.9,0,20.9-2.7,27.7-6.5v-20c-6.8,3.4-14.6,5.5-24.5,5.5c-9.7,0-18.3-3.4-19.4-15.2h48.9C413.8,121,414,115.8,414,113.4z
                                                        M364.6,103.9c0-11.3,6.9-16,13.2-16c6.1,0,12.6,4.7,12.6,16H364.6z"/>
                                                    <path class="ststr0" d="M301.1,67.6c-9.8,0-16.1,4.6-19.6,7.8l-1.3-6.2h-22v116.6l25-5.3l0.1-28.3c3.6,2.6,8.9,6.3,17.7,6.3
                                                        c17.9,0,34.2-14.4,34.2-46.1C335.1,83.4,318.6,67.6,301.1,67.6z M295.1,136.5c-5.9,0-9.4-2.1-11.8-4.7l-0.1-37.1
                                                        c2.6-2.9,6.2-4.9,11.9-4.9c9.1,0,15.4,10.2,15.4,23.3C310.5,126.5,304.3,136.5,295.1,136.5z"/>
                                                    <polygon class="ststr0" points="223.8,61.7 248.9,56.3 248.9,36 223.8,41.3 	"/>
                                                    <rect x="223.8" y="69.3" class="ststr0" width="25.1" height="87.5"/>
                                                    <path class="ststr0" d="M196.9,76.7l-1.6-7.4h-21.6v87.5h25V97.5c5.9-7.7,15.9-6.3,19-5.2v-23C214.5,68.1,202.8,65.9,196.9,76.7z"/>
                                                    <path class="ststr0" d="M146.9,47.6l-24.4,5.2l-0.1,80.1c0,14.8,11.1,25.7,25.9,25.7c8.2,0,14.2-1.5,17.5-3.3V135
                                                        c-3.2,1.3-19,5.9-19-8.9V90.6h19V69.3h-19L146.9,47.6z"/>
                                                    <path class="ststr0" d="M79.3,94.7c0-3.9,3.2-5.4,8.5-5.4c7.6,0,17.2,2.3,24.8,6.4V72.2c-8.3-3.3-16.5-4.6-24.8-4.6
                                                        C67.5,67.6,54,78.2,54,95.9c0,27.6,38,23.2,38,35.1c0,4.6-4,6.1-9.6,6.1c-8.3,0-18.9-3.4-27.3-8v23.8c9.3,4,18.7,5.7,27.3,5.7
                                                        c20.8,0,35.1-10.3,35.1-28.2C117.4,100.6,79.3,105.9,79.3,94.7z"/>
                                                </g>
                                            </svg>
                                        </span>
                                            @break
                                        @case('razorpay')
                                        <span class="inline-flex items-center">
                                            <svg height="15" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 26.53"
                                                style="enable-background:new 0 0 122.88 26.53" xml:space="preserve">
                                                <style type="text/css">
                                                    <![CDATA[
                                                    .strp0 {
                                                        fill: #3395FF;
                                                    }

                                                    .st1 {
                                                        fill: #072654;
                                                    }
                                                    ]]>
                                                </style>
                                                <g>
                                                    <polygon class="st1" points="11.19,9.03 7.94,21.47 0,21.47 1.61,15.35 11.19,9.03" />
                                                    <path class="st1"
                                                        d="M28.09,5.08C29.95,5.09,31.26,5.5,32,6.33s0.92,2.01,0.51,3.56c-0.27,1.06-0.82,2.03-1.59,2.8 c-0.8,0.8-1.78,1.38-2.87,1.68c0.83,0.19,1.34,0.78,1.5,1.79l0.03,0.22l0.6,5.09h-3.7l-0.62-5.48c-0.01-0.18-0.06-0.36-0.15-0.52 c-0.09-0.16-0.22-0.29-0.37-0.39c-0.31-0.16-0.65-0.24-1-0.25h-0.21h-2.28l-1.74,6.63h-3.46l4.3-16.38H28.09L28.09,5.08z M122.88,9.37l-4.4,6.34l-5.19,7.52l-0.04,0.04l-1.16,1.68l-0.04,0.06L112,25.09l-1,1.44h-3.44l4.02-5.67l-1.82-11.09h3.57 l0.9,7.23l4.36-6.19l0.06-0.09l0.07-0.1l0.07-0.09l0.54-1.15H122.88L122.88,9.37z M92.4,10.25c0.66,0.56,1.09,1.33,1.24,2.19 c0.18,1.07,0.1,2.18-0.21,3.22c-0.29,1.15-0.78,2.23-1.46,3.19c-0.62,0.88-1.42,1.61-2.35,2.13c-0.88,0.48-1.85,0.73-2.85,0.73 c-0.71,0.03-1.41-0.15-2.02-0.51c-0.47-0.28-0.83-0.71-1.03-1.22l-0.06-0.2l-1.77,6.75h-3.43l3.51-13.4l0.02-0.06l0.01-0.06 l0.86-3.25h3.35l-0.57,1.88l-0.01,0.08c0.49-0.7,1.15-1.27,1.91-1.64c0.76-0.4,1.6-0.6,2.45-0.6C90.84,9.43,91.7,9.71,92.4,10.25 L92.4,10.25z M88.26,12.11c-0.4-0.01-0.8,0.07-1.18,0.22c-0.37,0.15-0.71,0.38-1,0.66c-0.68,0.7-1.15,1.59-1.36,2.54 c-0.3,1.11-0.28,1.95,0.02,2.53c0.3,0.58,0.87,0.88,1.72,0.88c0.81,0.02,1.59-0.29,2.18-0.86c0.66-0.69,1.12-1.55,1.33-2.49 c0.29-1.09,0.27-1.96-0.03-2.57S89.08,12.11,88.26,12.11L88.26,12.11z M103.66,9.99c0.46,0.29,0.82,0.72,1.02,1.23l0.07,0.19 l0.44-1.66h3.36l-3.08,11.7h-3.37l0.45-1.73c-0.51,0.61-1.15,1.09-1.87,1.42c-0.7,0.32-1.45,0.49-2.21,0.49 c-0.88,0.04-1.76-0.21-2.48-0.74c-0.66-0.52-1.1-1.28-1.24-2.11c-0.18-1.06-0.12-2.14,0.19-3.17c0.3-1.15,0.8-2.24,1.49-3.21 c0.63-0.89,1.44-1.64,2.38-2.18c0.86-0.5,1.84-0.77,2.83-0.77C102.36,9.43,103.06,9.61,103.66,9.99L103.66,9.99z M101.92,12.14 c-0.41,0-0.82,0.08-1.19,0.24c-0.38,0.16-0.72,0.39-1.01,0.68c-0.67,0.71-1.15,1.59-1.36,2.55c-0.28,1.08-0.28,1.9,0.04,2.49 c0.31,0.59,0.89,0.87,1.75,0.87c0.4,0.01,0.8-0.07,1.18-0.22s0.71-0.38,1-0.66c0.59-0.63,1.02-1.38,1.26-2.22l0.08-0.31 c0.3-1.11,0.29-1.96-0.03-2.53C103.33,12.44,102.76,12.14,101.92,12.14L101.92,12.14z M81.13,9.63l0.22,0.09l-0.86,3.19 c-0.49-0.26-1.03-0.39-1.57-0.39c-0.82-0.03-1.62,0.24-2.27,0.75c-0.56,0.48-0.97,1.12-1.18,1.82l-0.07,0.27l-1.6,6.11h-3.42 l3.1-11.7h3.37l-0.44,1.72c0.42-0.58,0.96-1.05,1.57-1.4c0.68-0.39,1.44-0.59,2.22-0.59C80.51,9.48,80.83,9.52,81.13,9.63 L81.13,9.63z M68.5,10.19c0.76,0.48,1.31,1.24,1.52,2.12c0.25,1.06,0.21,2.18-0.11,3.22c-0.3,1.18-0.83,2.28-1.58,3.22 c-0.71,0.91-1.61,1.63-2.64,2.12c-1.05,0.49-2.19,0.74-3.35,0.73c-1.22,0-2.22-0.24-3-0.73c-0.77-0.48-1.32-1.24-1.54-2.12 c-0.24-1.06-0.2-2.18,0.11-3.22c0.3-1.17,0.83-2.27,1.58-3.22c0.71-0.9,1.62-1.63,2.66-2.12c1.06-0.49,2.22-0.75,3.39-0.73 C66.57,9.41,67.6,9.67,68.5,10.19L68.5,10.19z M64.84,12.1c-0.81-0.01-1.59,0.3-2.18,0.86c-0.61,0.58-1.07,1.43-1.36,2.57 c-0.6,2.29-0.02,3.43,1.74,3.43c0.8,0.02,1.57-0.29,2.15-0.85c0.6-0.57,1.04-1.43,1.34-2.58c0.3-1.13,0.31-1.98,0.01-2.57 C66.25,12.37,65.68,12.1,64.84,12.1L64.84,12.1z M57.89,9.76l-0.6,2.32l-7.55,6.67h6.06l-0.72,2.73H45.05l0.63-2.41l7.43-6.57 h-5.65l0.72-2.73H57.89L57.89,9.76z M40.96,9.99c0.46,0.29,0.82,0.72,1.02,1.23l0.07,0.19l0.44-1.66h3.37l-3.07,11.7h-3.37 l0.45-1.73c-0.51,0.6-1.14,1.08-1.85,1.41s-1.48,0.5-2.27,0.5c-0.88,0.04-1.74-0.22-2.45-0.74c-0.66-0.52-1.1-1.28-1.24-2.11 c-0.18-1.06-0.12-2.14,0.19-3.17c0.29-1.15,0.8-2.24,1.49-3.21c0.63-0.89,1.44-1.64,2.37-2.18c0.86-0.5,1.84-0.76,2.83-0.76 C39.66,9.44,40.36,9.62,40.96,9.99L40.96,9.99z M39.23,12.14c-0.41,0-0.81,0.08-1.19,0.24c-0.38,0.16-0.72,0.39-1.01,0.68 c-0.68,0.71-1.15,1.59-1.36,2.55c-0.28,1.08-0.27,1.9,0.04,2.49c0.31,0.59,0.89,0.87,1.75,0.87c0.4,0.01,0.8-0.07,1.18-0.22 c0.37-0.15,0.72-0.38,1-0.66c0.59-0.62,1.03-1.38,1.26-2.22l0.08-0.31c0.29-1.11,0.26-1.94-0.03-2.53 C40.64,12.44,40.06,12.14,39.23,12.14L39.23,12.14z M26.85,7.81h-3.21l-1.13,4.28h3.21c1.01,0,1.81-0.17,2.35-0.52 c0.57-0.37,0.98-0.95,1.13-1.63c0.2-0.72,0.11-1.27-0.27-1.62C28.55,7.99,27.86,7.81,26.85,7.81L26.85,7.81z" />
                                                    <polygon class="strp0"
                                                        points="18.4,0 12.76,21.47 8.89,21.47 12.7,6.93 6.86,10.78 7.9,6.95 18.4,0" />
                                                </g>
                                            </svg>
                                        </span>
                                            @break
                                        @default

                                    @endswitch


                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->transaction_id }}
                                </td>
                                <td class="py-2.5 px-4 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="javascript:;" class="underline underline-offset-2 decoration-dotted"

                                    @if(user_can('Show Order'))
                                    wire:click="$dispatch('showOrderDetail', { id: {{ $item->order->id }} })"
                                    @endif

                                    >@lang('modules.order.orderNumber') #{{ $item->order->order_number }}</a>
                                </td>
                                <td class="py-2.5 px-4 space-x-2 whitespace-nowrap text-right dark:text-white">
                                    {{ $item->created_at->timezone(timezone())->translatedFormat('d M Y, h:i A') }}
                                </td>
                            </tr>
                            @empty
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2.5 px-4 space-x-6 dark:text-white" colspan="5">
                                    @lang('messages.noPaymentFound')
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div wire:key='payments-table-paginate-{{ microtime() }}'
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center mb-4 sm:mb-0 w-full">
            {{ $payments->links() }}
        </div>
    </div>
</div>
