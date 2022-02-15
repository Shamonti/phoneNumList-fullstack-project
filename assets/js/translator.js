function doGTranslate(lang_pair) {
  if (lang_pair.value) lang_pair = lang_pair.value;
  if (lang_pair == '') return;
  var lang = lang_pair.split('|')[1];
  var plang = location.pathname.split('/')[1];
  if (
    plang.length != 2 &&
    plang.toLowerCase() != 'zh-cn' &&
    plang.toLowerCase() != 'zh-tw'
  )
    plang = 'en';
  if (lang == 'en')
    location.href =
      location.protocol +
      '//' +
      location.host +
      location.pathname.replace('/' + plang + '/', '/') +
      location.search;
  else
    location.href =
      location.protocol +
      '//' +
      location.host +
      '/' +
      lang +
      location.pathname.replace('/' + plang + '/', '/') +
      location.search;
}
