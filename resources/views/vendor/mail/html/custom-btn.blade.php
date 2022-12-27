<div align="left " style="margin-right: 1rem;">
    <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:37px; v-text-anchor:middle; width:168px;" arcsize="0%"  stroke="f" fillcolor="#ff5770"><w:anchorlock/><center style="color:#FFFFFF;font-family:'Open Sans',sans-serif;"><![endif]-->
    <a href="{{ $data['url'] }}" target="_blank" class="v-button v-size-width"
        style="box-sizing: border-box;display: inline-block;font-family:'Open Sans',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: {{ $color ?? '#ff5770' }}; border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;  max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
        <span style="display:block;padding:10px 20px;line-height:120%;"><span
                style="font-size: 14px; line-height: 16.8px;">{{ $data['slot'] }}</span></span>
    </a>
    <!--[if mso]></center></v:roundrect><![endif]-->
</div>
