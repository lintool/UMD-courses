<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
    <html>
        <head>
            <title>Private Archives</title>
            <link rel="stylesheet" href="../archives.css"/>
        </head>
        <body style="font-family:Arial, Helvetica, sans-serif">
            <br/>
            <h1 align="center">Private Archives</h1>
            <xsl:for-each select="archiveslisting/archives">
                <xsl:sort select="parentinstitution" order="ascending"/>
                <xsl:sort select="institution" order="ascending"/>
                <xsl:choose>
                    <xsl:when test="@type='private'">
                            <hr size="1" width="600" align="center"></hr>
                            <table size="600" cellspacing="4" align="center">
                                <tr>
                                    <td width="400" valign="top">
                                        <xsl:choose>
                                            <xsl:when test="institution='NA'">
                                                <h2><xsl:value-of select="parentinstitution"/></h2></xsl:when>
                                            <xsl:otherwise><h2><xsl:value-of select="parentinstitution"/></h2>
                                                <xsl:value-of select="institution"/><br/></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="address='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="address"/><br/></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="address2='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="address2"/><br/></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="city='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="city"/><xsl:text>, </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="state='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="state"/><xsl:text> </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="zip='NA'"><br/></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="zip"/><br/></xsl:otherwise>
                                        </xsl:choose>
                                            <xsl:choose>
                                            <xsl:when test="website='NA'"></xsl:when>
                                            <xsl:otherwise>
                                                    <a target="_blank"><xsl:attribute name="href"><xsl:value-of
                                                        select="website"/></xsl:attribute>
                                                        Website</a>
                                            </xsl:otherwise>
                                            </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="opportunities='NA'"></xsl:when>
                                            <xsl:otherwise>
                                                <br/><i><xsl:text>Opportunities Available: </xsl:text></i><br/>
                                                <xsl:value-of select="opportunities"/><br/>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                    </td>
                                    <td width="200" align="left" valign="center" bgcolor="#E0E0E0" cellpadding="5">
                                        <b><i><xsl:text>Contact: </xsl:text></i></b><br/>
                                        <xsl:choose>
                                            <xsl:when test="contact/prefix='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/prefix"/><xsl:text> </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/firstname='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/firstname"/><xsl:text> </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/middlename='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/middlename"/><xsl:text> </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/lastname='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/lastname"/><xsl:text> </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/suffix='NA'"><br/></xsl:when>
                                            <xsl:otherwise>, <xsl:value-of select="contact/suffix"/><br/></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/title='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/title"/><br/></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/phone='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/phone"/><xsl:text>  </xsl:text></xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/ext='NA'"><br/></xsl:when>
                                            <xsl:otherwise>
                                                <i><xsl:text> Ext: </xsl:text></i>
                                                <xsl:value-of select="contact/ext"/><br/>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/fax='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/fax"/>
                                                <i><xsl:text> fax </xsl:text></i><br/>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        <xsl:choose>
                                            <xsl:when test="contact/email='NA'"></xsl:when>
                                            <xsl:otherwise><xsl:value-of select="contact/email"/></xsl:otherwise>
                                        </xsl:choose>
                                    </td>
                                </tr>
                            </table>
                    </xsl:when>
                    </xsl:choose>
            </xsl:for-each>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>
