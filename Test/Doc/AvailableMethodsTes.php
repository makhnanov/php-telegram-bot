<?php

namespace Makhnanov\Telegram81\Test;

class AvailableMethodsTes
{



}


/**
 * Copied html from official site
 *
 * @todo autoparse
 * @link https://core.telegram.org/bots/api#available-types
 */
$methods = <<<HTML
<ul class="nav"><li><a href="#getme" data-target="#getme" onmouseenter="showTitleIfOverflows(this)">getMe</a></li><li><a href="#logout" data-target="#logout" onmouseenter="showTitleIfOverflows(this)">logOut</a></li><li><a href="#close" data-target="#close" onmouseenter="showTitleIfOverflows(this)">close</a></li><li><a href="#sendmessage" data-target="#sendmessage" onmouseenter="showTitleIfOverflows(this)">sendMessage</a></li><li><a href="#formatting-options" data-target="#formatting-options" onmouseenter="showTitleIfOverflows(this)">Formatting options</a></li><li><a href="#forwardmessage" data-target="#forwardmessage" onmouseenter="showTitleIfOverflows(this)">forwardMessage</a></li><li><a href="#copymessage" data-target="#copymessage" onmouseenter="showTitleIfOverflows(this)">copyMessage</a></li><li><a href="#sendphoto" data-target="#sendphoto" onmouseenter="showTitleIfOverflows(this)">sendPhoto</a></li><li><a href="#sendaudio" data-target="#sendaudio" onmouseenter="showTitleIfOverflows(this)">sendAudio</a></li><li><a href="#senddocument" data-target="#senddocument" onmouseenter="showTitleIfOverflows(this)">sendDocument</a></li><li><a href="#sendvideo" data-target="#sendvideo" onmouseenter="showTitleIfOverflows(this)">sendVideo</a></li><li><a href="#sendanimation" data-target="#sendanimation" onmouseenter="showTitleIfOverflows(this)">sendAnimation</a></li><li><a href="#sendvoice" data-target="#sendvoice" onmouseenter="showTitleIfOverflows(this)">sendVoice</a></li><li><a href="#sendvideonote" data-target="#sendvideonote" onmouseenter="showTitleIfOverflows(this)">sendVideoNote</a></li><li><a href="#sendmediagroup" data-target="#sendmediagroup" onmouseenter="showTitleIfOverflows(this)">sendMediaGroup</a></li><li><a href="#sendlocation" data-target="#sendlocation" onmouseenter="showTitleIfOverflows(this)">sendLocation</a></li><li><a href="#editmessagelivelocation" data-target="#editmessagelivelocation" onmouseenter="showTitleIfOverflows(this)">editMessageLiveLocation</a></li><li><a href="#stopmessagelivelocation" data-target="#stopmessagelivelocation" onmouseenter="showTitleIfOverflows(this)">stopMessageLiveLocation</a></li><li><a href="#sendvenue" data-target="#sendvenue" onmouseenter="showTitleIfOverflows(this)">sendVenue</a></li><li><a href="#sendcontact" data-target="#sendcontact" onmouseenter="showTitleIfOverflows(this)">sendContact</a></li><li><a href="#sendpoll" data-target="#sendpoll" onmouseenter="showTitleIfOverflows(this)">sendPoll</a></li><li><a href="#senddice" data-target="#senddice" onmouseenter="showTitleIfOverflows(this)">sendDice</a></li><li><a href="#sendchataction" data-target="#sendchataction" onmouseenter="showTitleIfOverflows(this)">sendChatAction</a></li><li><a href="#getuserprofilephotos" data-target="#getuserprofilephotos" onmouseenter="showTitleIfOverflows(this)">getUserProfilePhotos</a></li><li><a href="#getfile" data-target="#getfile" onmouseenter="showTitleIfOverflows(this)">getFile</a></li><li><a href="#banchatmember" data-target="#banchatmember" onmouseenter="showTitleIfOverflows(this)">banChatMember</a></li><li><a href="#unbanchatmember" data-target="#unbanchatmember" onmouseenter="showTitleIfOverflows(this)">unbanChatMember</a></li><li><a href="#restrictchatmember" data-target="#restrictchatmember" onmouseenter="showTitleIfOverflows(this)">restrictChatMember</a></li><li><a href="#promotechatmember" data-target="#promotechatmember" onmouseenter="showTitleIfOverflows(this)">promoteChatMember</a></li><li><a href="#setchatadministratorcustomtitle" data-target="#setchatadministratorcustomtitle" onmouseenter="showTitleIfOverflows(this)">setChatAdministratorCustomTitle</a></li><li><a href="#setchatpermissions" data-target="#setchatpermissions" onmouseenter="showTitleIfOverflows(this)">setChatPermissions</a></li><li><a href="#exportchatinvitelink" data-target="#exportchatinvitelink" onmouseenter="showTitleIfOverflows(this)">exportChatInviteLink</a></li><li><a href="#createchatinvitelink" data-target="#createchatinvitelink" onmouseenter="showTitleIfOverflows(this)">createChatInviteLink</a></li><li><a href="#editchatinvitelink" data-target="#editchatinvitelink" onmouseenter="showTitleIfOverflows(this)">editChatInviteLink</a></li><li><a href="#revokechatinvitelink" data-target="#revokechatinvitelink" onmouseenter="showTitleIfOverflows(this)">revokeChatInviteLink</a></li><li><a href="#setchatphoto" data-target="#setchatphoto" onmouseenter="showTitleIfOverflows(this)">setChatPhoto</a></li><li><a href="#deletechatphoto" data-target="#deletechatphoto" onmouseenter="showTitleIfOverflows(this)">deleteChatPhoto</a></li><li><a href="#setchattitle" data-target="#setchattitle" onmouseenter="showTitleIfOverflows(this)">setChatTitle</a></li><li><a href="#setchatdescription" data-target="#setchatdescription" onmouseenter="showTitleIfOverflows(this)">setChatDescription</a></li><li><a href="#pinchatmessage" data-target="#pinchatmessage" onmouseenter="showTitleIfOverflows(this)">pinChatMessage</a></li><li><a href="#unpinchatmessage" data-target="#unpinchatmessage" onmouseenter="showTitleIfOverflows(this)">unpinChatMessage</a></li><li><a href="#unpinallchatmessages" data-target="#unpinallchatmessages" onmouseenter="showTitleIfOverflows(this)">unpinAllChatMessages</a></li><li><a href="#leavechat" data-target="#leavechat" onmouseenter="showTitleIfOverflows(this)">leaveChat</a></li><li><a href="#getchat" data-target="#getchat" onmouseenter="showTitleIfOverflows(this)">getChat</a></li><li><a href="#getchatadministrators" data-target="#getchatadministrators" onmouseenter="showTitleIfOverflows(this)">getChatAdministrators</a></li><li><a href="#getchatmembercount" data-target="#getchatmembercount" onmouseenter="showTitleIfOverflows(this)">getChatMemberCount</a></li><li><a href="#getchatmember" data-target="#getchatmember" onmouseenter="showTitleIfOverflows(this)">getChatMember</a></li><li><a href="#setchatstickerset" data-target="#setchatstickerset" onmouseenter="showTitleIfOverflows(this)">setChatStickerSet</a></li><li><a href="#deletechatstickerset" data-target="#deletechatstickerset" onmouseenter="showTitleIfOverflows(this)">deleteChatStickerSet</a></li><li><a href="#answercallbackquery" data-target="#answercallbackquery" onmouseenter="showTitleIfOverflows(this)">answerCallbackQuery</a></li><li><a href="#setmycommands" data-target="#setmycommands" onmouseenter="showTitleIfOverflows(this)">setMyCommands</a></li><li><a href="#deletemycommands" data-target="#deletemycommands" onmouseenter="showTitleIfOverflows(this)">deleteMyCommands</a></li><li><a href="#getmycommands" data-target="#getmycommands" onmouseenter="showTitleIfOverflows(this)">getMyCommands</a></li><li><a href="#inline-mode-methods" data-target="#inline-mode-methods" onmouseenter="showTitleIfOverflows(this)">Inline mode methods</a></li></ul>
HTML;

/**
 * Add new lines via std php ext tidy
 */
$tidy = new Tidy();
$tidy->parseString($methods, [], 'utf8');
$tidy->cleanRepair();

/**
 * Remove all html tags via HTMLPurifier by ezyang
 */
$purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
$purifier->config->set('HTML.AllowedElements', []);

$badElements = ['Formatting', 'Inline mode methods', 'options'];

$methods = explode(PHP_EOL, trim($purifier->purify($tidy)));
foreach ($methods as $key => $method) {
    if (in_array($method, $badElements, true)) {
        unset($methods[$key]);
    }
}
sort($methods);
echo implode(PHP_EOL, $methods);

$methods = [
    '',
];