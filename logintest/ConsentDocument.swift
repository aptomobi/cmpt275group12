////
////  ConsentDocument.swift
////  logintest
////
////  Created by Evgeny KUZNETSOV on 10/31/15.
////  Copyright (c) 2015 Evgeny KUZNETSOV. All rights reserved.
////
//
//import Foundation
//import ResearchKit
//
//public var ConsentDocument: ORKConsentDocument {
//    
//    let consentDocument = ORKConsentDocument()
//    consentDocument.title = "Example Consent"
//    
//    let consentSectionTypes: [ORKConsentSectionType] = [
//        .Overview,
//        .DataGathering,
//        .Privacy,
//        .DataUse,
//        .TimeCommitment,
//        .StudySurvey,
//        .StudyTasks,
//        .Withdrawing
//    ]
//    var consentSections: [ORKConsentSection] = consentSectionTypes.map
//    { contentSectionType in
//        let consentSection = ORKConsentSection(type: contentSectionType)
//        consentSection.summary = "If you wish to complete this study..."
//        consentSection.content = "In this study you will be asked five (wait, no, three!) questions. You will also have your voice recorded for ten seconds."
//        return consentSection
//    }
//    
//    consentDocument.sections = consentSections
//    
//    consentDocument.addSignature(ORKConsentSignature(forPersonWithTitle: nil, dateFormatString: nil, identifier: "ConsentDocumentParticipantSignature"))
//    
//    return consentDocument
//}