<?php
/*
 *  Copyright (C) 2009 Nouweo
 *  
 *  Nouweo is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *  
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function edit_cmt_news($id_news, $id_comment)
{
    $add_txt_sql = '';
    $contenu_cmt = Nw::$DB->real_escape_string(parse(htmlspecialchars(trim($_POST['contenu']))));

    if (!isset($_POST['hidden_edit']))
        $add_txt_sql = ', c_edit_membre = '.intval(Nw::$dn_mbr['u_id']).', c_edit_date = NOW()';

    Nw::$DB->query('UPDATE '.Nw::$prefix_table.'news_commentaires 
        SET c_texte = \''.$contenu_cmt.'\''.$add_txt_sql.'
        WHERE c_id_news = '.intval($id_news).' AND c_id = '.intval($id_comment)) OR Nw::$DB->trigger(__LINE__, __FILE__);
}
