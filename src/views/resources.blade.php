@if( null != $config  && '' != $config)
    <script type="text/javascript" charset="utf-8"
            src="{!!asset('assets/js/UEditor/'.$config.'.config.js')!!}"></script>
@else
    <script type="text/javascript" charset="utf-8"
            src="{!!asset('assets/js/UEditor/user.config.js')!!}"></script>
@endif

<script type="text/javascript" charset="utf-8" src="{!!asset('assets/js/UEditor/ueditor.all.min.js')!!}"></script>
<script type="text/javascript" charset="utf-8" src="{!!asset('assets/js/UEditor/lang/zh-cn/zh-cn.js')!!}"></script>

