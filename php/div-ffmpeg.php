<div id="ffmpeg">
    <audio controls>
        <!-- <source src="/tmp/文.ogg" /> -->
    </audio>
    <a href id="delete-current-extracted-audio" title="消す"><img src="https://cdn3.iconfinder.com/data/icons/tools-solid-icons-vol-2/72/59-512.png" alt="delete current extracted audio" width="32" height="32"></a>
    <br><br>
    <!--form-->
    <input type="text" id="ffmpeg-string-from" placeholder="「時」から" />
    <input type="text" id="ffmpeg-string-to" placeholder="「時」まで">
    <input type="text" id="ffmpeg-custom-filename" placeholder="カスタム保存ファイル名前">
    <button id="btn-extract-audio">オーディオをextractする</button>
    <a id="link-download-audio" download><button id="btn-download-audio" disabled>ダウンロード</button></a>
    <!--/form-->
</div>