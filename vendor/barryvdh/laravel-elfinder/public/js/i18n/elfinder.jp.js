/**
 * Japanese translation
 * @author Tomoaki Yoshida <info@yoshida-studio.jp>
 * @author Naoki Sawada <hypweb@gmail.com>
 * @version 2014-04-08
 */
if (elFinder && elFinder.prototype && typeof(elFinder.prototype.i18) == 'object') {
	elFinder.prototype.i18.jp = {
		translator : 'Tomoaki Yoshida &lt;info@yoshida-studio.jp&gt;, Naoki Sawada &lt;hypweb@gmail.com&gt;',
		language   : 'Japanese',
		direction  : 'ltr',
		dateFormat : 'Y/m/d h:i A', // 2012/04/11 05:27 PM
		fancyDateFormat : '$1 h:i A', // will produce smth like: 今日 12:25 PM
		messages   : {
			
			/********************************** errors **********************************/
			'error'                : 'エラー',
			'errUnknown'           : '不明なエラーです',
			'errUnknownCmd'        : '不明なコマンドです',
			'errJqui'              : '無効なjQuery UI コンフィグレーションです。セレクタブルコンポーネント、ドラッガブルコンポーネント、ドロッパブルコンポーネントがあるかを確認して下さい',
			'errNode'              : 'elFinderはDOM Elementが必要です',
			'errURL'               : '無効なelFinder コンフィグレーションです! URLを設定してください',
			'errAccess'            : 'アクセスが拒否されました',
			'errConnect'           : 'バックエンドとの接続ができません',
			'errAbort'             : '接続が中断されました',
			'errTimeout'           : '接続がタイムアウトしました.',
			'errNotFound'          : 'バックエンドが見つかりません',
			'errResponse'          : '無効なバックエンドコンフィグレーションです',
			'errConf'              : '無効なバックエンドコンフィグレーションです',
			'errJSON'              : 'PHP JSON モジュールがインストールされていません',
			'errNoVolumes'         : '読み込み可能なボリュームが入手できません',
			'errCmdParams'         : 'コマンド "$1"のパラメーターが無効です',
			'errDataNotJSON'       : 'JSONデータではありません',
			'errDataEmpty'         : '空のデータです',
			'errCmdReq'            : 'バックエンドリクエストがコマンド名を要求しています',
			'errOpen'              : '"$1"を開くことができません',
			'errNotFolder'         : 'オブジェクトがフォルダーではありません',
			'errNotFile'           : 'オブジェクトがファイルではありません',
			'errRead'              : '"$1"を読むことができません',
			'errWrite'             : '"$1"に書きこむことができません',
			'errPerm'              : '権限がありません',
			'errLocked'            : '"$1" はロックされているので名前の変更、移動、削除ができません',
			'errExists'            : '"$1"というファイル名はすでに存在しています',
			'errInvName'           : '無効なファイル名です',
			'errFolderNotFound'    : 'フォルダーが見つかりません',
			'errFileNotFound'      : 'ファイルが見つかりません',
			'errTrgFolderNotFound' : 'ターゲットとするフォルダー "$1" が見つかりません',
			'errPopup'             : 'ポップアップウィンドウが開けません。ファイルを開くにはブラウザの設定を変更してください',
			'errMkdir'             : '"$1"フォルダーを作成することができません',
			'errMkfile'            : '"$1"ファイルを作成することができません',
			'errRename'            : '"$1"の名前を変更することができません',
			'errCopyFrom'          : '"$1"からのファイルコピーが許可されていません',
			'errCopyTo'            : '"$1"へのファイルコピーが許可されていません',
			'errUpload'            : 'アップロードエラー',  // old name - errUploadCommon
			'errUploadFile'        : '"$1"がアップロードできません', // old name - errUpload
			'errUploadNoFiles'     : 'アップロードされたファイルがありません',
			'errUploadTotalSize'   : 'データが許容サイズを超えています', // old name - errMaxSize
			'errUploadFileSize'    : 'ファイルが許容サイズを超えています', //  old name - errFileMaxSize
			'errUploadMime'        : '許可されていないファイル形式です',
			'errUploadTransfer'    : '"$1" 転送エラーです', 
			'errNotReplace'        : 'アイテム "$1" は、すでにこの場所にありますがアイテムのタイプが違うので置き換えることはできません', // new
			'errReplace'           : '"$1"を置き換えることができません',
			'errSave'              : '"$1"を保存することができません',
			'errCopy'              : '"$1"をコピーすることができません',
			'errMove'              : '"$1"を移動することができません',
			'errCopyInItself'      : '"$1"をそれ自身の中にコピーすることはできません',
			'errRm'                : '"$1"を削除することができません',
			'errRmSrc'             : 'Unable remove source file(s).',
			'errExtract'           : '"$1"を解凍することができません',
			'errArchive'           : 'アーカイブを作成することができません',
			'errArcType'           : 'サポート外のアーカイブ形式です',
			'errNoArchive'         : 'アーカイブでないかサポートされていないアーカイブ形式です',
			'errCmdNoSupport'      : 'サポートされていないコマンドです',
			'errReplByChild'       : 'フォルダ "$1" に含まれてるアイテムを置き換えることはできません',
			'errArcSymlinks'       : 'シンボリックリンクまたは許容されないファイル名を含むアーカイブはセキュリティ上、解凍できません', // edited 25.06.2012
			'errArcMaxSize'        : 'アーカイブが許容されたサイズを超えています',
			'errResize'            : '"$1"をリサイズできません',
			'errResizeDegree'      : 'イメージの回転角度が不正です',  // added 7.3.2013
			'errResizeRotate'      : 'イメージの回転ができません',  // added 7.3.2013
			'errResizeSize'        : '指定されたイメージサイズが不正です',  // added 7.3.2013
			'errResizeNoChange'    : 'イメージサイズなどの変更がありません',  // added 7.3.2013
			'errUsupportType'      : 'このファイルタイプはサポートされません',
			'errNotUTF8Content'    : 'ファイル "$1" には UTF-8 以外の文字が含まれているので編集できません',  // added 9.11.2011
			'errNetMount'          : '"$1"をマウントできません', // added 17.04.2012
			'errNetMountNoDriver'  : 'サポートされていないプロトコルです',     // added 17.04.2012
			'errNetMountFailed'    : 'マウントに失敗しました',         // added 17.04.2012
			'errNetMountHostReq'   : 'ホスト名は必須です', // added 18.04.2012
			'errSessionExpires'    : 'アクションがなかったため、セッションが期限切れになりました',
			'errCreatingTempDir'   : '一時ディレクトリを作成できません："$1"',
			'errFtpDownloadFile'   : 'FTP からファイルをダウンロードできません："$1"',
			'errFtpUploadFile'     : 'FTP へファイルをアップロードできません："$1"',
			'errFtpMkdir'          : 'FTP にリモートディレクトリを作成できません："$1"',
			'errArchiveExec'       : 'ファイルのアーカイブ中にエラーが発生しました："$1"',
			'errExtractExec'       : 'ファイルの抽出中にエラーが発生しました："$1"',
			'errNetUnMount'        : 'アンマウントできません', // added 30.04.2012
			'errConvUTF8'          : 'UTF-8 に変換できませんでした', // added 08.04.2014
			
			/******************************* commands names ********************************/
			'cmdarchive'   : 'アーカイブ作成',
			'cmdback'      : '戻る',
			'cmdcopy'      : 'コピー',
			'cmdcut'       : 'カット',
			'cmddownload'  : 'ダウンロード',
			'cmdduplicate' : '複製',
			'cmdedit'      : 'ファイル編集',
			'cmdextract'   : 'アーカイブを解凍',
			'cmdforward'   : '進む',
			'cmdgetfile'   : 'ファイル選択',
			'cmdhelp'      : 'このソフトウェアについて',
			'cmdhome'      : 'ホーム',
			'cmdinfo'      : '情報',
			'cmdmkdir'     : '新規フォルダー',
			'cmdmkfile'    : '新規テキストファイル',
			'cmdopen'      : '開く',
			'cmdpaste'     : 'ペースト',
			'cmdquicklook' : 'プレビュー',
			'cmdreload'    : 'リロード',
			'cmdrename'    : 'リネーム',
			'cmdrm'        : '削除',
			'cmdsearch'    : 'ファイルを探す',
			'cmdup'        : '親ディレクトリーへ移動',
			'cmdupload'    : 'ファイルアップロード',
			'cmdview'      : 'ビュー',
			'cmdresize'    : 'リサイズと回転',
			'cmdsort'      : 'ソート',
			'cmdnetmount'  : 'ネットワークボリュームをマウント', // added 18.04.2012
			'cmdnetunmount': 'アンマウント', // added 30.04.2012
			
			/*********************************** buttons ***********************************/ 
			'btnClose'  : '閉じる',
			'btnSave'   : '保存',
			'btnRm'     : '削除',
			'btnApply'  : '適用',
			'btnCancel' : 'キャンセル',
			'btnNo'     : 'いいえ',
			'btnYes'    : 'はい',
			'btnMount'  : 'マウント',  // added 18.04.2012
			'btnApprove': '$1へ行き認可する', // added 26.04.2012
			'btnUnmount': 'アンマウント', // added 30.04.2012
			'btnConv'   : '変換', // added 08.04.2014
			/******************************** notifications ********************************/
			'ntfopen'     : 'フォルダーを開いています',
			'ntffile'     : 'ファイルを開いています',
			'ntfreload'   : 'フォルダーを再読込しています',
			'ntfmkdir'    : 'ディレクトリーを作成しています',
			'ntfmkfile'   : 'ファイルを作成しています',
			'ntfrm'       : 'ファイルを削除しています',
			'ntfcopy'     : 'ファイルをコピーしています',
			'ntfmove'     : 'ファイルを移動しています',
			'ntfprepare'  : 'ファイルコピーを準備しています',
			'ntfrename'   : 'ファイル名を変更しています',
			'ntfupload'   : 'ファイルをアップロードしています',
			'ntfdownload' : 'ファイルをダウンロードしています',
			'ntfsave'     : 'ファイルを保存しています',
			'ntfarchive'  : 'アーカイブ作成しています',
			'ntfextract'  : 'アーカイブを解凍しています',
			'ntfsearch'   : 'ファイル検索中',
			'ntfresize'   : 'リサイズしています',
			'ntfsmth'     : '処理をしています',
      		'ntfloadimg'  : 'イメージを読み込んでいます',
      		'ntfnetmount' : 'ネットワークボリュームをマウントしています', // added 18.04.2012
      		'ntfnetunmount': 'ネットワークボリュームをアンマウントしています', // added 30.04.2012
			'ntfdim'      : '画像サイズを取得しています', // added 20.05.2013
			'ntfreaddir'  : 'ホルダ情報を読み取っています', // added 01.07.2013
			'ntfurl'      : 'リンクURLを取得しています', // added 11.03.2014
			
			/************************************ dates **********************************/
			'dateUnknown' : '不明',
			'Today'       : '今日',
			'Yesterday'   : '昨日',
			'Jan'         : '1月',
			'Feb'         : '2月',
			'Mar'         : '3月',
			'Apr'         : '4月',
			'May'         : '5月',
			'Jun'         : '6月',
			'Jul'         : '7月',
			'Aug'         : '8月',
			'Sep'         : '9月',
			'Oct'         : '10月',
			'Nov'         : '11月',
			'Dec'         : '12月',

			/******************************** sort variants ********************************/
			'sortname'          : '名前順', 
			'sortkind'          : '種類順', 
			'sortsize'          : 'サイズ順',
			'sortdate'          : '日付順',
			'sortFoldersFirst'  : 'フォルダ優先', // added 21.06.2012

			/********************************** messages **********************************/
			'confirmReq'      : '処理を実行しますか？',
			'confirmRm'       : '本当にファイルを削除しますか?<br/>この操作は取り消せません！',
			'confirmRepl'     : '古いファイルを新しいファイルで上書きしますか？',
			'confirmConvUTF8' : 'UTF-8 以外の文字が含まれています。<br/>UTF-8  に変換しますか？<br/>変換後の保存でコンテンツは UTF-8 になります。', // added 08.04.2014
			'apllyAll'        : '全てに適用します',
			'name'            : '名前',
			'size'            : 'サイズ',
			'perms'           : '権限',
			'modify'          : '更新',
			'kind'            : '種類',
			'read'            : '読み取り',
			'write'           : '書き込み',
			'noaccess'        : 'アクセス禁止',
			'and'             : ',',
			'unknown'         : '不明',
			'selectall'       : '全てのファイルを選択',
			'selectfiles'     : 'ファイル選択',
			'selectffile'     : '最初のファイルを選択',
			'selectlfile'     : '最後のファイルを選択',
			'viewlist'        : 'リスト形式で見る',
			'viewicons'       : 'アイコン形式で見る',
			'places'          : 'Places',
			'calc'            : '計算', 
			'path'            : 'パス',
			'aliasfor'        : 'エイリアス',
			'locked'          : 'ロックされています',
			'dim'             : 'サイズ',
			'files'           : 'ファイル',
			'folders'         : 'フォルダー',
			'items'           : 'アイテム',
			'yes'             : 'はい',
			'no'              : 'いいえ',
			'link'            : 'リンク',
			'searcresult'     : '検索結果',  
			'selected'        : '選択されたアイテム',
			'about'           : 'アバウト',
			'shortcuts'       : 'ショートカット',
			'help'            : 'ヘルプ',
			'webfm'           : 'ウェブファイルマネージャー',
			'ver'             : 'バージョン',
			'protocolver'     : 'プロトコルバージョン',
			'homepage'        : 'プロジェクトホーム',
			'docs'            : 'ドキュメンテーション',
			'github'          : 'Github でフォーク',
			'twitter'         : 'Twitter でフォロー',
			'facebook'        : 'Facebookグループ に参加',
			'team'            : 'チーム',
			'chiefdev'        : 'チーフデベロッパー',
			'developer'       : 'デベロッパー',
			'contributor'     : 'コントリビュータ',
			'maintainer'      : 'メインテナー',
			'translator'      : '翻訳者',
			'icons'           : 'アイコン',
			'dontforget'      : 'タオル忘れちゃだめよー。',
			'shortcutsof'     : 'ショートカットは利用できません',
			'dropFiles'       : 'ここにファイルをドロップ',
			'or'              : 'または',
			'selectForUpload' : 'アップロードするファイルを選択',
			'moveFiles'       : 'ファイルを移動',
			'copyFiles'       : 'ファイルをコピー',
			'rmFromPlaces'    : 'ここから削除',
			'aspectRatio'     : '縦横比維持',
			'scale'           : '表示縮尺',
			'width'           : '幅',
			'height'          : '高さ',
			'resize'          : 'リサイズ',
			'crop'            : '切り抜き',
			'rotate'          : '回転',
			'rotate-cw'       : '90度左回転',
			'rotate-ccw'      : '90度右回転',
			'degree'          : '度',
			'netMountDialogTitle' : 'ネットワークボリュームのマウント', // added 18.04.2012
			'protocol'            : 'プロトコル', // added 18.04.2012
			'host'                : 'ホスト名', // added 18.04.2012
			'port'                : 'ポート', // added 18.04.2012
			'user'                : 'ユーザー名', // added 18.04.2012
			'pass'                : 'パスワード', // added 18.04.2012
			'confirmUnmount'      : '$1をアンマウントしますか?',  // added 30.04.2012
			'dropFilesBrowser': 'ブラウザからファイルをドロップまたは貼り付け', // added 30.05.2012
			'dropPasteFiles'  : 'ここにファイルをドロップまたは貼り付け', // added 07.04.2014

			/********************************** mimetypes **********************************/
			'kindUnknown'     : '不明',
			'kindFolder'      : 'フォルダー',
			'kindAlias'       : '別名',
			'kindAliasBroken' : '宛先不明の別名',
			// applications
			'kindApp'         : 'アプリケーション',
			'kindPostscript'  : 'Postscript ドキュメント',
			'kindMsOffice'    : 'Microsoft Office ドキュメント',
			'kindMsWord'      : 'Microsoft Word ドキュメント',
			'kindMsExcel'     : 'Microsoft Excel ドキュメント',
			'kindMsPP'        : 'Microsoft Powerpoint プレゼンテーション',
			'kindOO'          : 'Open Office ドキュメント',
			'kindAppFlash'    : 'Flash アプリケーション',
			'kindPDF'         : 'PDF',
			'kindTorrent'     : 'Bittorrent ファイル',
			'kind7z'          : '7z アーカイブ',
			'kindTAR'         : 'TAR アーカイブ',
			'kindGZIP'        : 'GZIP アーカイブ',
			'kindBZIP'        : 'BZIP アーカイブ',
			'kindZIP'         : 'ZIP アーカイブ',
			'kindRAR'         : 'RAR アーカイブ',
			'kindJAR'         : 'Java JAR ファイル',
			'kindTTF'         : 'True Type フォント',
			'kindOTF'         : 'Open Type フォント',
			'kindRPM'         : 'RPM パッケージ',
			// texts
			'kindText'        : 'Text ドキュメント',
			'kindTextPlain'   : 'プレインテキスト',
			'kindPHP'         : 'PHP ソース',
			'kindCSS'         : 'Cascading style sheet',
			'kindHTML'        : 'HTML ドキュメント',
			'kindJS'          : 'Javascript ソース',
			'kindRTF'         : 'Rich Text フォーマット',
			'kindC'           : 'C ソース',
			'kindCHeader'     : 'C ヘッダーソース',
			'kindCPP'         : 'C++ ソース',
			'kindCPPHeader'   : 'C++ ヘッダーソース',
			'kindShell'       : 'Unix shell スクリプト',
			'kindPython'      : 'Python ソース',
			'kindJava'        : 'Java ソース',
			'kindRuby'        : 'Ruby ソース',
			'kindPerl'        : 'Perl スクリプト',
			'kindSQL'         : 'SQL ソース',
			'kindXML'         : 'XML ドキュメント',
			'kindAWK'         : 'AWK ソース',
			'kindCSV'         : 'CSV',
			'kindDOCBOOK'     : 'Docbook XML ドキュメント',
			// images
			'kindImage'       : 'イメージ',
			'kindBMP'         : 'BMP イメージ',
			'kindJPEG'        : 'JPEG イメージ',
			'kindGIF'         : 'GIF イメージ',
			'kindPNG'         : 'PNG イメージ',
			'kindTIFF'        : 'TIFF イメージ',
			'kindTGA'         : 'TGA イメージ',
			'kindPSD'         : 'Adobe Photoshop イメージ',
			'kindXBITMAP'     : 'X bitmap イメージ',
			'kindPXM'         : 'Pixelmator イメージ',
			// media
			'kindAudio'       : 'オーディオメディア',
			'kindAudioMPEG'   : 'MPEG オーディオ',
			'kindAudioMPEG4'  : 'MPEG-4 オーディオ',
			'kindAudioMIDI'   : 'MIDI オーディオ',
			'kindAudioOGG'    : 'Ogg Vorbis オーディオ',
			'kindAudioWAV'    : 'WAV オーディオ',
			'AudioPlaylist'   : 'MP3 プレイリスト',
			'kindVideo'       : 'ビデオメディア',
			'kindVideoDV'     : 'DV ムービー',
			'kindVideoMPEG'   : 'MPEG ムービー',
			'kindVideoMPEG4'  : 'MPEG-4 ムービー',
			'kindVideoAVI'    : 'AVI ムービー',
			'kindVideoMOV'    : 'Quick Time ムービー',
			'kindVideoWM'     : 'Windows Media ムービー',
			'kindVideoFlash'  : 'Flash ムービー',
			'kindVideoMKV'    : 'Matroska ムービー',
			'kindVideoOGG'    : 'Ogg ムービー'
		}
	};
}

