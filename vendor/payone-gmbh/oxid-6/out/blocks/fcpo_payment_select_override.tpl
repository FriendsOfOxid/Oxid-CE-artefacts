[{assign var="aFcPoCCPaymentMetaData" value=$oView->fcpoGetCCPaymentMetaData()}]
[{assign var="aFcPoOnlinePaymentMetaData" value=$oView->fcpoGetOnlinePaymentMetaData()}]
[{assign var="dynvalue" value=$oView->getDynValue()}]
[{assign var="sFcPoTemplatePath" value=$oView->fcpoGetActiveThemePath()}]

[{if $oView->fcpoShowAsRegularPaymentSelection($sPaymentID) == false}]
    [{*Don't show this payment in standard checkout => mostly express payments*}]
[{elseif $sPaymentID == "fcpocreditcard" && $oView->fcpoGetCreditcardType() == "ajax"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_creditcard_ajax.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpocreditcard" && $oView->fcpoGetCreditcardType() == "hosted"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_creditcard_hosted.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpodebitnote"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_debitnote.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpoklarna"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_klarna.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpopo_bill"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_payolution_bill.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpopo_debitnote"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_payolution_debitnote.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpopo_installment"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_payolution_installment.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcporp_bill"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_ratepay_bill.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcporp_debitnote"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_ratepay_debitnote.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpo_secinvoice"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_secinvoice.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpo_sofort"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_sofort.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpo_trustly"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_trustly.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpo_giropay"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_giropay.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpo_eps"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_eps.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $sPaymentID == "fcpo_ideal"}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_ideal.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{elseif $oView->fcpoIsKlarnaCombined($sPaymentID)}]
    [{if $oView->fcpoShowKlarnaCombined($sPaymentID)}]
        [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_klarna_combined.tpl'}]
        [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
    [{/if}]
[{elseif $sPaymentID == "fcpo_apple_pay"}]
    [{if $oView->fcpoAplGetDeviceCheck() && $oView->fcpoAplCertificateCheck()}]
        [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_default.tpl'}]
        [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
    [{/if}]
[{elseif $oViewConf->fcpoIsPayonePayment($sPaymentID)}]
    [{assign var="sFcPoTemplatePath" value=$sFcPoTemplatePath|cat:'/fcpo_payment_default.tpl'}]
    [{include file=$oViewConf->fcpoGetAbsModuleTemplateFrontendPath($sFcPoTemplatePath)}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
