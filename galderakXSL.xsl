<?xml version="1.0" ?>
	<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<HTML> <BODY> 
		<TABLE border="1">
		<THEAD>
			<TR> <TH>Galdera</TH> <TH>Konplexutasuna</TH></TR>
		</THEAD>
			<xsl:for-each select="/assessmentItems/assessmentItem" >
				<TR>
					<TD>
						Galdera: <FONT SIZE="2" COLOR="green" FACE="Verdana">
							<xsl:value-of select="itemBody/p"/> <BR/>
						</FONT>
					</TD>
					<TD>
						Konplexutasuna: <FONT SIZE="2" COLOR="blue" FACE="Verdana">
							<xsl:value-of select="@konplexutasuna"/> <BR/>
						</FONT>
					</TD>
				</TR>
			</xsl:for-each>
		</TABLE>
		</BODY>
		</HTML>
	</xsl:template>
</xsl:stylesheet>