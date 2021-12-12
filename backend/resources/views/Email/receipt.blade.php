<div role="article" aria-roledescription="email" aria-label="Your receipt for order 12345" lang="en">
    <table style="width: 100%; font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif;" cellpadding="0" cellspacing="0" role="presentation">
        <tbody>
            <tr>
                <td align="center" class="dark-mode-bg-gray-999" style="background-color: #f3f4f6;">
                    <table class="sm-w-full" style="width: 600px;" cellpadding="0" cellspacing="0" role="presentation">
                        <tbody>
                            <tr>
                                <td align="center" class="sm-px-24">
                                    <table style="margin-bottom: 48px; width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="dark-mode-bg-gray-989 dark-mode-text-gray-979 sm-px-24" style="background-color: #ffffff; padding: 48px; text-align: left; font-size: 16px; line-height: 24px; color: #1f2937;">
                                                    <p class="sm-leading-32 dark-mode-text-white" style="margin: 0; margin-bottom: 36px; font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif; font-size: 24px; font-weight: 600; color: #000000;">
                                                        Thanks for your order.
                                                    </p>
                                                    <p style="margin: 0; margin-bottom: 24px;">
                                                        This email is a receipt for your order number 12345.
                                                    </p>
                                                    <p style="margin: 0; margin-bottom: 24px;">
                                                        Order# {{$data['unique_order_id']}}
                                                        <br>
                                                    </p>
                                                    <table id="example" class="stripe hover dataTable no-footer dtr-inline" style="width: 100%; padding-top: 1em; padding-bottom: 1em;" role="grid" aria-describedby="example_info">
                                                        <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Price</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;">
                                                            <tr>
                                                                <td>{{$data['product_name']}}</td>
                                                                <td>{{$data['qty']}}</td>
                                                                <td>{{$data['unit_price']}}</td>
                                                                <td>{{$data['total_price']}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr/>
                                                    <br/>
                                                    <a href="http://localhost:3000/login" class="hover-bg-blue-600" style="display: inline-block; background-color: #3b82f6; padding-left: 24px; padding-right: 24px; padding-top: 16px; padding-bottom: 16px; text-align: center; font-size: 16px; font-weight: 600; text-transform: uppercase; color: #ffffff; text-decoration: none;">
                                                        <span style="mso-text-raise: 16px">View Order Details</span>
                                                    </a>
                                                    <table style="width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding-top: 32px; padding-bottom: 32px;">
                                                                    <hr style="border-bottom-width: 0px; border-color: #f3f4f6;">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>