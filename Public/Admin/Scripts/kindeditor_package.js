
function loadeditor(selector,width,height,uploaddir,rootdir,resizeType) {
	var ewidth = !width ? '80%':width,
		eheight = !height ? '300px':height,
		eresizeType = !resizeType ? 1:resizeType;
	//return eresizeType;
	if (selector == '' || uploaddir == '') {
		return false;	
	}
	
	var editor;
			KindEditor.ready(function(K) {
				editor = K.create(selector, {
					width :ewidth,
					height:eheight,
					resizeType : eresizeType,
					themeType : 'simple',
					allowPreviewEmoticons : true,
					allowImageUpload : true,
					uploadJson : rootdir+'/Editor/uploadifyChk?updir='+uploaddir,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat','wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'unlink', 'image','multiimage','insertfile','|','quickformat','preview']
				});
			});
}
