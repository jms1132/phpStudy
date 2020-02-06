var name_exp = /^[가-힣]{2,4}$/;
var email_exp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,}$/;
var pw_exp = /^(?=.*[a-zA-Z])(?=.*[!@$%^&*])(?=.*[0-9]).{4,12}$/;
var phone_exp1 = /^01([0|1|6|7|8|9]?)$/;
var phone_exp2 = /^[0-9]{3,4}$/;

function done(){

if (!(document.member_form.pass.value.match(pw_exp))) {
    alert("비밀번호를 형식에 맞게 입력하세요!");
    document.member_form.pass.focus();
    return;
}
if (document.member_form.pass.value !==
      document.member_form.pass_confirm.value) {
    alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
    document.member_form.pass.focus();
    document.member_form.pass.select();
    return;
}
if (!(document.member_form.name.value.match(name_exp))) {
  alert("이름을 올바르게 입력해주세요.");
    document.member_form.name.focus();
    return;
}
if (!(document.member_form.email.value.match(email_exp))) {
  alert("이메일 주소를 올바르게 입력해주세요.");
    document.member_form.email.focus();
    return;
}
if (!(document.member_form.phone1.value.match(phone_exp1))) {
  alert("휴대폰 번호1를 올바르게 입력해주세요.");
    document.member_form.phone1.focus();
    return;
}
if (!(document.member_form.phone2.value.match(phone_exp2))) {
  alert("휴대폰 번호2를 올바르게 입력해주세요.");
    document.member_form.phone2.focus();
    return;
}
if (!(document.member_form.phone3.value.match(phone_exp2))) {
  alert("휴대폰 번호3를 올바르게 입력해주세요.");
    document.member_form.phone3.focus();
    return;
}
document.member_form.submit();

}
function reset_form() {
   document.member_form.id.value = "";
   document.member_form.pass.value = "";
   document.member_form.pass_confirm.value = "";
   document.member_form.name.value = "";
   document.member_form.email.value = "";

   document.member_form.phone1.value = "";
   document.member_form.phone2.value = "";
   document.member_form.phone3.value = "";
   document.member_form.id.focus();
   return;
}
