<div>
    <form action='http://localhost/KuveytTurk_Ornek_PHP/4_OnayCevap.php' method='post'>
        <div style="margin:0 auto">
            <p>Onay Ekrani</p>
            <h2>Ödeme Onayi</h2>
            <table>
                <tr colspan="3">
                    <td>
                        Hata Kodu
                    </td>
                    <td>
            <input name="ResponseCode" Type="text" value='{{$xxml->ResponseCode}}' />
     
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        Açıklama
                    </td>
                    <td>
                        <input name="ResponseMessage" Type="text" value="{{$xxml->ResponseMessage }}" />
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        Üye Siparis No
                    </td>
                    <td>
                        <input name="MerchantOrderId" Type="text" value="{{$xxml->VPosMessage->MerchantOrderId }}" />
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        SanalPos Siparis No
                    </td>
                    <td>
                        <input name="OrderId" Type="text"  value="{{$xxml->VPosMessage->OrderId}}" />
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        Provizyon No
                    </td>
                    <td>
                        <input name="ProvisionNumber" Type="text" value="{{$xxml->VPosMessage->ProvisionNumber}}"/> 
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        RRN
                    </td>
                    <td>
                         <input name="RRN" Type="text" value="{{$xxml->VPosMessage->RRN}}" /> 
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        Stan
                    </td>
                    <td>
                         <input name="Stan" Type="text" value="{{$xxml->VPosMessage->Stan}}" /> 
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        MD
                    </td>
                    <td>
                        <input name="MD" Type="text" value="{{$xxml->MD}}" /> 
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        Islem Tutarı
                    </td>
                    <td>
                         <input name="Amount" Type="text" value="{{$xxml->VPosMessage->Amount}}" /> 
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        HashData
                    </td>
                    <td>
                         <input name="HashData" Type="text" value="{{$xxml->VPosMessage->HashData}}"/> 
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        Dogrulama
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr colspan="3">
                    <td>
                        <input id= "submit" type="submit" value="Onayla" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
